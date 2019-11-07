@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" href="/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_responsive.css">
@endsection


@section('body')

    <div class="container single_product_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('categories')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$product->categories->superCategory->name}}</a></li>
                        <li><a href="{{route('categories')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$product->categories->name}}</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$product->name}}</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">
                        <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                            <div class="single_product_thumbnails">
                                <ul>
                                    <li><img src="/storage/product_images/{{$product->img}}" alt="" data-image="/storage/product_images/{{$product->img}}"></li>
                                    <li class="active"><img src="/storage/product_images/{{$product->img_2}}" alt="" data-image="/storage/product_images/{{$product->img_2}}"></li>
                                    <li><img src="/storage/product_images/{{$product->thumbnail }}" alt="" data-image="/storage/product_images/{{$product->thumbnail }}"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">
                                <div class="single_product_image_background" style="background-image:url('/storage/product_images/{{$product->img}}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">
                    <div class="product_details_title">
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span>free delivery</span>
                    </div>
                    @if($product->discounted_price != 0)
                        <div class="original_price">${{$product->price}}</div>
                        <div class="product_price">${{$product->discounted_price}}</div>
                    @else

                    @endif
                    <ul class="star_rating">
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    </ul>
                    <div class="product_color">
                        <span>Select Color:</span>
                        <ul>
                            <li style="background: #e54e5d"></li>
                            <li style="background: #252525"></li>
                            <li style="background: #60b3f3"></li>
                        </ul>
                    </div>
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        <span>Quantity:</span>
                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                        <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('JSLinks')

    <script src="/js/single_custom.js"></script>
@endsection
