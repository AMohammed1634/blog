@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" href="/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_responsive.css">

    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;

            background-size: 100%, 100%;


            background-image: none;
        }

        .carousel-control-next-icon:after
        {
            content: '>';
            font-size: 55px;
            color: red;
        }

        .carousel-control-prev-icon:after {
            content: '<';
            font-size: 55px;
            color: red;
        }
    </style>
@endsection


@section('body')

    <div class="container single_product_container">
        <div class="row">
            <div class="col">
{{--                {{$product->productColors[0]->productSize}}--}}
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
                                <div id="pro" class="single_product_image_background" style="background-image:url('/storage/product_images/{{$product->img}}')"></div>
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
                        <div class="product_price">${{$product->price}}</div>
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
                            @foreach($product->productColors as $product_color)
                                <li class="color" style="background: {{$product_color->colorCode}};border: 1px solid #DDD"
                                    index="{{$product_color->id}}" id="color{{$product_color->id}}"
                                    colorImage="{{$product_color->colorProduct}}"
                                ></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="product_color">
                        <span>Select Size:</span>
                        <select class="select2-dropdown">
                            @if(count($product->productColors) != 0)
                                @foreach($product->productColors[0]->productSize as $productSize)
                                    <option index="{{$productSize->id}}">{{$productSize->size}}</option>
                                @endforeach
                            @else

                            @endif
                        </select>
                    </div>
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        <span>Quantity:</span>
                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="#" id="addToCart">add to cart</a></div>
                        <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>

                    </div>
                    <a href="{{route('getDesignView',$product->id)}}">
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-apple"></span><span>Try To Design It</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>


    </div>

    <div class="tabs_section_container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabs_container">
                        <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                            <li class="tab" data-active-tab="tab_1"><span>Also Like</span></li>
                            <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
                            <li class="tab active" data-active-tab="tab_3"><span>Reviews ({{count($product->reviews)}})</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <!-- Tab Description -->

                    <div id="tab_1" class="tab_container">
                        <div class="row">
                            <div class="col-lg-5 desc_col">
                                <div class="tab_title">
                                    <h4>Also Like</h4>
                                </div>


                            </div>

                        </div>
                        <div class="row" >
                            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel"
                                 style="width: 100%;height: 500px;;box-shadow: 5px 10px 8px #888888,-5px -10px 8px #888888;
                                 ">
                                <div class="carousel-inner" style="">
                                    <div class="carousel-item active" data-interval="10000">
                                        <div class="card" style="width: 18rem;display: inline-block;margin-left: 70px;
                                                            ">
                                            <img src="/storage/product_images/{{$product->img}}" class="card-img-top"
                                                 alt="..." style="height: 302px">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>

                                        <div class="card" style="width: 18rem;display: inline-block;
                                                           margin: 0px 60px ">
                                            <img src="/storage/product_images/{{$product->img}}" class="card-img-top"
                                                 alt="..." style="height: 302px">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;display: inline-block;
                                                    margin-right: 70px;   ">
                                            <img src="/storage/product_images/{{$product->img}}" class="card-img-top"
                                                 alt="..." style="height: 302px">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>

                                    related Products
                                    <br>
                                    @foreach($roles as $role)
                                        <div class="carousel-item" data-interval="2000">
                                        @foreach($role as $items)
                                            @if(is_array($items))
                                                @foreach($items as $pro)

                                                    @if($pro->id == $product->id)
                                                        {{$pro}}
                                                    @endif
                                                @endforeach
                                            @else
                                                {{$items}}
                                            @endif
                                            <span style="color: #ff0000">-->></span>
                                        @endforeach
                                        </div>
                                        <br><span style="color: #ff0000">End The ROle </span><br>
                                    @endforeach


{{--                                            <img src="" class="d-block w-100" alt="...">--}}



                                    <div class="carousel-item">
                                        <img src="" class="d-block w-100" alt="...">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev"
                                style="width: 60px" >
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next"
                                   style="width: 60px">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Additional Info -->

                    <div id="tab_2" class="tab_container">
                        <div class="row">
                            <div class="col additional_info_col">
                                <div class="tab_title additional_info_title">
                                    <h4>Additional Information</h4>
                                </div>
                                <p>COLOR:<span>Gold, Red</span></p>
                                <p>SIZE:<span>L,M,XL</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Reviews -->

                    <div id="tab_3" class="tab_container active">
                        <div class="row">

                            <!-- User Reviews -->

                            <div class="col-lg-6 reviews_col">
                                <div class="tab_title reviews_title">
                                    <h4>Reviews ({{count($product->reviews)}})</h4>
                                </div>

                                <!-- User Review -->
                                <?php
                                $countOfReviews = $product->reviews->count();
                                $counter = 0;
                                ?>
                                @foreach($product->reviews as $review)
                                    <div class="user_review_container d-flex flex-column flex-sm-row">
                                    <div class="user">
                                        <div class="user_pic">
                                            <img src="/storage/profile_images/{{$review->users->img}}"
                                                 style="width: 100%;height: 100%;border-radius: 50%" >
                                        </div>
                                        <div class="user_rating">
                                            <ul class="star_rating">
{{--                                                {{$review->rating}}--}}
                                                @for($i=0;$i<$review->rating;$i++)
                                                    <li>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </li>
                                                @endfor
                                                @for($i=$review->rating;$i<5;$i++)
                                                    <li>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review_date">{{$review->created_at}}</div>
                                        <div class="user_name">{{$review->users->name}}</div>
                                        <p>{!! $review->review !!}</p>
                                    </div>
                                </div>

                                    @if($counter>=2)
                                        <?php break; ?>
                                    @endif
                                <?php $counter++; ?>
                                @endforeach
                                <!-- User Review -->
                                <div class="btn btn-outline-primary">Show More</div>

                            </div>

                            <!-- Add Review -->

                            <div class="col-lg-6 add_review_col">

                                <div class="add_review">
                                    <form id="review_form" method="post" action="{{route('addReview',$product->id)}}">
                                        @csrf
                                        <div>
                                            <h1>Add Review</h1>

                                        </div>
                                        <div>
                                            <h1>Your Rating:</h1>
                                            <ul class="user_star_rating" id="rating-stars">
                                                @for($i=0;$i<5;$i++)
                                                    <li><i class="fa fa-star-o" aria-hidden="true" id="star{{$i}}"></i></li>
                                                @endfor
{{--                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>--}}
{{--                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>--}}
{{--                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>--}}
{{--                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>--}}
{{--                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>--}}
                                            </ul>
                                            <input type="text" name="rate" value="0" style="display: none;" id="rate">
                                            <script>

                                            </script>
                                            <textarea id="review_message" class="input_review" name="message" placeholder="Your Review" rows="4" required="" data-error="Please, leave us a review."></textarea>
                                        </div>
                                        <div class="text-left text-sm-right">
                                            <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection



@section('JSLinks')

    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/js/single_custom.js"></script>
    <script src="/js/singleProduct.js"></script>
    <script>
        let selectedColor = -1;
        // 01129674856
        $("#addToCart").click((e)=>{
            e.preventDefault();
            @guest
                alert("Login First")
            @else
                let url = "http://127.0.0.1:8000/products/{{$product->id}}/addToChart/{{Auth::user()->id}}",
                    method = "GET",
                    data = {};
                callAPI(url,method,data);
            @endguest

        });
        $(".color").click((e)=>{
            let id = e.target.getAttribute('id');
            selectedColor = id;
            let colorProduct = e.target.getAttribute('colorImage');
            // console.log(colorProduct);
            $(".color").css({
                'border':'1px solid #DDD'
            })
            $("#"+id).css({
                'border':'2px solid #000000'
            })
            $("#pro").attr('style',"background-image:url('/storage/product_images/"+colorProduct+"')");
        })
    </script>
@endsection
