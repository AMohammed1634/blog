
@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection

@section('body')

    <div class="container" style="margin-top: 170px">
        <div class="new-commerce">
            New Commerce
        </div>

    </div>
    <div class="container">
        <div class="related-products">
            related Products
            <br>
            @foreach($roles as $role)

                @foreach($role as $items)
                    @if(is_array($items))
                        @foreach($items as $product)
                            {{$product}}
                        @endforeach
                    @else
                        {{$items}}
                    @endif
                    <span style="color: #ff0000">-->></span>
                @endforeach
                <br><span style="color: #ff0000">End The ROle </span><br>
            @endforeach
        </div>
    </div>
@endsection

@section('JSLinks')

    <script src="js/categories_custom.js"></script>

    <script src="js/categoriesFunctions.js"></script>
@endsection
