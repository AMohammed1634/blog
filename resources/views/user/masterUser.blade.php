<!DOCTYPE html>
<html lang="en">
    <head>
        <title>T-shirt Design LAb</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Colo Shop Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
        <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">

        <link href="/fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
        @yield('links')
        <style>
            .account_selection li a{
                display: inline;
            }
        </style>
    </head>
    <body>
    {{--TopNavBar--}}
    <header class="header trans_300">

        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->
                                {{-- Admin Section
                                 Will Show to admin only
                                 --}}
                                @guest

                                @else
                                    @if(Auth::user()->roles_id == 3)
                                        <li class="language">
                                            <a href="#">
                                                Admin
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="language_selection">
                                                <li><a href="{{route('dashboard')}}">Admin Panel</a></li>
                                                <li><a href="{{route('FPTree')}}">Related Products</a></li>
                                                <li><a href="#">German</a></li>
                                                <li><a href="#">Spanish</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        {{"Not Admin"}}
                                    @endif
                                @endguest
{{--                                <li class="currency">--}}
{{--                                    <a href="#">--}}
{{--                                        usd--}}
{{--                                        <i class="fa fa-angle-down"></i>--}}
{{--                                    </a>--}}
{{--                                    <ul class="currency_selection">--}}
{{--                                        <li><a href="#">cad</a></li>--}}
{{--                                        <li><a href="#">aud</a></li>--}}
{{--                                        <li><a href="#">eur</a></li>--}}
{{--                                        <li><a href="#">gbp</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="language">--}}
{{--                                    <a href="#">--}}
{{--                                        English--}}
{{--                                        <i class="fa fa-angle-down"></i>--}}
{{--                                    </a>--}}
{{--                                    <ul class="language_selection">--}}
{{--                                        <li><a href="#">French</a></li>--}}
{{--                                        <li><a href="#">Italian</a></li>--}}
{{--                                        <li><a href="#">German</a></li>--}}
{{--                                        <li><a href="#">Spanish</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection" style="min-width: 200px">

                                        @guest
                                            <li class="">
                                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                <a class="inline" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                    <a class="inline" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="" style="font-size: x-small">
                                                <a class="" href="{{route('viewProfile',Auth::user()->id)}}" > {{ Auth::user()->name }} </a>
                                            </li>
                                            <li class="">

                                                    <a class="" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>

                                            </li>
                                        @endguest
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="{{route('categories')}}">T-shrit <span>Design LAb</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="{{route('categories')}}">home</a></li>
                                <li><a href="#">shop</a></li>

                                <li><a href="#">pages</a></li>
                                @guest
                                    <li>
                                        <a href="{{ route("login") }}">
                                            Contact Admin
                                        </a>
                                    </li>
                                @else
                                <li>
                                    @if(auth()->user()->id != 1)
                                        <a href="{{ route("chats",[1]) }}">
                                            Contact Admin
                                        </a>
                                    @else
                                        <a href="{{ route("chats",[6]) }}">
                                            Contact Admin
                                        </a>
                                    @endif
                                </li>

                                @endguest

                            </ul>
                            <ul class="navbar_user">
                                <li>
                                    <a href="{{route("search.search_form")}}">
                                        <i style="font-size: large" class="fa fa-search">

                                        </i>
                                    </a>
                                </li>
{{--                                <li>--}}
{{--                                    @guest--}}
{{--                                    <a href="{{ route("login") }}">--}}

{{--                                        <i class="fab fa-facebook-messenger" style="font-size: 27px;color:blue;--}}
{{--                                                margin-top: -40px"></i>--}}
{{--                                    </a>--}}
{{--                                    @else--}}
{{--                                        <a href="{{ route("chats") }}">--}}
                                            <?php

//                                            $messages = App\message::where([
//                                                "message_to" => auth()->user()->id,
//                                                "readed" => 0
//                                            ])->get();
                                            ?>
{{--                                            <i class="fab fa-facebook-messenger" style="font-size: 27px;color:blue;--}}
{{--                                                margin-top: -40px"></i>--}}
{{--                                                @if(count($messages) > 0)--}}
{{--                                                    <span id="" class="checkout_items" style="top: -27px">--}}
{{--                                                        {{count($messages)}}--}}
{{--                                                    </span>--}}
{{--                                                @endif--}}
{{--                                        </a>--}}
{{--                                    @endguest--}}
{{--                                </li>--}}
                                @guest
                                    <li><a href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                @else
                                    <li>

                                        <a href="{{route('viewProfile',Auth::user()->id)}}" style="top:15px;border:none">
{{--                                            <i class="fa fa-user" aria-hidden="true"></i>--}}
                                            <img src="/storage/profile_images/{{\Illuminate\Support\Facades\Auth::user()->img}}"
                                            style="width: 100%;height: 100%;border-radius: 50%;border: none">
                                        </a>
                                    </li>
                                @endguest

                                <li class="checkout">
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <a href="{{route('view-cart')}}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">{{\Illuminate\Support\Facades\Auth::user()->shoppingCart->where('ordered',-1)->count()}}</span>
                                        </a>
                                    @else
                                        <a href="#">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
{{--                                            <span id="checkout_items" class="checkout_items">2</span>--}}
                                        </a>
                                    @endif
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <!-- Hamburger Menu -->

    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        usd
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">cad</a></li>
                        <li><a href="#">aud</a></li>
                        <li><a href="#">eur</a></li>
                        <li><a href="#">gbp</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        English
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">French</a></li>
                        <li><a href="#">Italian</a></li>
                        <li><a href="#">German</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">promotion</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
            </ul>
        </div>
    </div>
    {{-- EndMainNavigation --}}
    @yield('body')

    {{--}}
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="/js/app.js"></script>
    {{--Footer--}}


    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                        <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                        <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">©2018 All Rights Reserverd. Template by <a href="#">Colorlib</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{--EndFooter--}}
    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    @yield('JSLinks')
<script>

</script>

    </body>
</html>
