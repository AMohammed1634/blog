@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/UserProfile.css">
@endsection


@section('body')

<div class="" style="padding-top:150px; ">
    <div class="header-section container">
        ASD
        <div class="local-image">
            <img src="/storage/profile_images/{{$user->img}}" title="change Image" id="profile-image">
            @guest

            @else
            <form action="{{route('changeImage',Auth::user()->id)}}" method="POST" id="form" enctype="multipart/form-data" style="display: none">
                @csrf
                <input type="file" name="image" id="image">
                <input type="submit" name="submit" id="submit">
            </form>
            @endguest
        </div>
        <div class="user-name">
            <h2 style="color: #ffffff"> {{$user->name}}</h2>
        </div>
    </div>
    <div class="container body" style="">
        <div class="row">
            <div class="col-lg-2 left-side" style="padding-left: 0px;padding-right: 0px;padding-top: 30px">
                <h3 style="color:#ffffff">ENteracions </h3>
                <div class="item-actions">
                    <div class="left" style="">.</div>
                    <div class="right">Orders </div>
                </div>
                <br style="clear: both">
                <div class="item-actions">
                    <div class="left" style="">.</div>
                    <div class="right">Shopping Carts</div>
                </div>

                <br style="clear: both">
                <div class="item-actions">
                    <div class="left" style="">.</div>
                    <div class="right">Wish List</div>
                </div>
                <br style="clear: both">
                <div class="item-actions">
                    <div class="left" style="">.</div>
                    <div class="right">Designed Products</div>
                </div>
            </div>
            <div class="col-lg-10" style="padding-top: 30px">
                col-lg-9
            </div>
        </div>
    </div>
</div>

@endsection



@section('JSLinks')

    <script src="/js/categories_custom.js"></script>

    <script src="/js/categoriesFunctions.js"></script>
    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/js/UserProfile.js"></script>
@endsection


