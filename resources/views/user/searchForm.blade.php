@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection


@section('body')

    <div class="container" style="margin-top: 200px">
        <form style="width: 70%;margin:auto" method="post" action="{{route("search.search_result")}}">
            @csrf
            <div class="form-group">


                <div class="input-group date">

                    <input name="name" type="text" class="form-control pull-right" id="datepicker"
                    placeholder="Search ..">
                    <button class="input-group-addon" style="cursor: pointer" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- /.input group -->
            </div>
        </form>
    </div>

    @isset($searchItems)
        <div class="container">
            @foreach($searchItems as $product)
            <div class="item-cart" style="border: 1px solid #DDD;margin: 4px 5px">
                <img style="width: 15%" src="/storage/product_images/{{$product->img}}">
                <a href="{{route('viewProduct',[$product->id])}}"
                   style="vertical-align: center;margin: 4px 6px">
                    {{$product->name}}
                </a>
                <div style="margin: 4px 10px;width: 50px;display: inline">
                    {{$product->description}}
                </div>
            </div>
            @endforeach
        </div>
    @endisset
@endsection


@section('JSLinks')

    <script src="/js/categories_custom.js"></script>

    <script src="/js/categoriesFunctions.js"></script>
@endsection
