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
                            <li class="tab" data-active-tab="tab_1"><span>Description</span></li>
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
                                    <h4>Description</h4>
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                                <div class="tab_image">
                                    <img src="images/desc_1.jpg" alt="">
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-2 desc_col">
                                <div class="tab_image">
                                    <img src="images/desc_2.jpg" alt="">
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                                <div class="tab_image desc_last">
                                    <img src="images/desc_3.jpg" alt="">
                                </div>
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
                                                @for($i=$review->rating;$i<=5;$i++)
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
                                        <p>{{$review->review}}</p>
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
                                    <form id="review_form" action="post">
                                        <div>
                                            <h1>Add Review</h1>

                                        </div>
                                        <div>
                                            <h1>Your Rating:</h1>
                                            <ul class="user_star_rating" id="rating-stars">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
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

    <script src="/js/single_custom.js"></script>
@endsection
