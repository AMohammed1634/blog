@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection


@section('body')





    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{route('categories')}}">Home</a></li>

                        @foreach($category as $item)
                            <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$item->name}}'s</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">


                            <?php
                                $itemName ="";
                            ?>
                            @foreach($category as $item)
                                <li class="active">
                                    <a href="http://127.0.0.1:8000/category?page={{$item->id - 7}}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                        {{$item->name}}
                                        <?php
                                            $itemName = $item->name;
                                        ?>
                                    </a>
                                </li>
                            @endforeach
                            @foreach($Allcategory as $cat)
                                @if($cat->name != $itemName)
                                    <li><a href="http://127.0.0.1:8000/category?page={{$cat->id - 7}}">{{$cat->name}}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div>

                    <!-- Price Range Filtering -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Filter by Price</h5>
                        </div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color: #FFF; font-weight:bold;width:185px">
                        </p>
                        <div id="slider-range"></div>
                        <button class="filter_button" id="filter" style="border: none"><span>filter</span></button>
                    </div>

                    <!-- Sizes -->

                    {{--}}
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Sizes</h5>
                        </div>
                        <ul class="checkboxes">
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
                            <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
                        </ul>
                    </div>

                    <!-- Color -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Color</h5>
                        </div>
                        <ul class="checkboxes">
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
                            <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                        </ul>
                        <div class="show_more">
                            <span><span>+</span>Show More</span>
                        </div>
                    </div>
                    --}}
                </div>
                <div class="products_iso">
                    <div class="row">
                        <div class="col">

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_top">
                                <ul class="product_sorting">
                                    <li>
                                        <span class="type_sorting_text">Default Sorting</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_type">
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span>Show</span>
                                        <span class="num_sorting_text">6</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>6</span></li>
                                            <li class="num_sorting_btn"><span>12</span></li>
                                            <li class="num_sorting_btn"><span>24</span></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="pages d-flex flex-row align-items-center">
                                    {{$category->links()}}

                                </div>

                            </div>

                        </div>
                    </div>
                </div>



            <?php
                $linkClicked = false;
            ?>
                @if(!$linkClicked)
                @foreach($category as $item)

                    <!-- Main Content -->

                    <div class="main_content" id="mainDiv">
                        <div style="text-align: center; font-size: xx-large;margin-top: 50px">{{$item->name}} Category</div>
                            <!-- Products -->

                            <div class="products_iso">
                                <div class="row">
                                    <div class="col">



                                        <!-- Product Grid -->

                                        <div class="product-grid">

                                            <!-- Product 1 -->
                                            @foreach($item->subCategory as $subCategory)
                                                {{--GetTheLatestElementInDataBase--}}
                                                <div class="product-item men" style="display: inline-block;width: 24%">
                                                    <div class="product discount product_filter">
                                                        <div class="product_image">
                                                            <img src="/storage/product_images/{{$subCategory->products->last()->img}}" alt=""
                                                                 style="width: 90%;margin: 5%;height: 198px;">
                                                        </div>
                                                        <div class="favorite favorite_left"></div>
                                                        @if($subCategory->products->last()->discounted_price != 0)
                                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                                <span>-${{($subCategory->products->last()->price  - $subCategory->products->last()->discounted_price)}}</span>
                                                            </div>
                                                        @endif
                                                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center">
                                                            <span>new</span></div>
                                                        <div class="product_info">


                                                            <h4>
                                                                <a href="{{route('singleCategory',$subCategory->id)}}" id="subCat-{{$subCategory->id}}" class="subCat">
                                                                    {{$subCategory->name}} Sub.Cat
                                                                </a>
                                                            </h4>

                                                            <h6 class="product_name"><a href="{{route('viewProduct',$subCategory->products->last()->id)}}">{{$subCategory->products->last()->name}}</a></h6>
                                                            <div class="product_price">
                                                                @if($subCategory->products->last()->discounted_price == 0)
                                                                    ${{$subCategory->products->last()->price}}
                                                                @else
                                                                    ${{$subCategory->products->last()->price}}
                                                                    <span>${{$subCategory->products->last()->discounted_price}}</span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="red_button add_to_cart_button">
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            <a href='/products/{{$subCategory->products->last()->id}}/addToChart/{{\Illuminate\Support\Facades\Auth::user()->id}}'
                                                                id="user:{{\Illuminate\Support\Facades\Auth::user()->id}},product:{{$subCategory->products->last()->id}}" class="addToChart">
                                                                add to cart
                                                            </a>
                                                        @else
                                                            <a href='{{route('login')}}'>
                                                                add to cart
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach



                                        </div>

                                        <!-- Product Sorting -->

                                        <div class="product_sorting_container product_sorting_container_bottom clearfix">

                                            {{$category->links()}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                    asd
                @endif



                <!-- Sidebar -->




            </div>
        </div>
    </div>
@endsection



@section('JSLinks')

    <script src="js/categories_custom.js"></script>

    <script src="js/categoriesFunctions.js"></script>
@endsection


