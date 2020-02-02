@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" href="/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_responsive.css">
    <link rel="stylesheet" href="/css.app.css">
    <script src="/js/app.js"></script>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/responsive.css" rel="stylesheet">

{{--    admin lte--}}

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
@endsection


@section('body')

<div style="padding-top:200px;">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive" style="width: 100%">
                        <thead style="background-color: #f4f2f8">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        ?>
                        @foreach($carts as $cart)
                            <tr>
                                <td class="cart_product_img d-flex align-items-center" style="width: 710px;">
                                    <a href="#" ><img src="/storage/product_images/{{$cart->products->img}}" alt="Product"
                                                      style="width: 120px;height: 115.5px"></a>
                                    <h6><a href="{{route('viewProduct',$cart->products->id)}}"> {{$cart->products->name}} </a></h6>

                                </td>
                                <td class="price">
                                    <span>
                                        @if($cart->products->discounted_price == 0)
                                            ${{$cart->products->price}}
                                        @else
                                            ${{$cart->products->discounted_price}}
                                        @endif

                                    </span>
                                </td>
                                <td class="qty">
                                    <div class="quantity" style="margin-top: 3px">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" index="{{$cart->id}}" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{$cart->quantity}}">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                </td>
                                <?php
                                $total+=($cart->quantity * $cart->products->price );
                                ?>
                                <td class="total_price"><span>${{($cart->quantity * $cart->products->price )}}</span></td>
                                <td>
                                    <div class="" style="margin: 10px"><a class="btn btn-danger delete_link" index="{{$cart->id}}" href="{{route('view-cart.delete',$cart->id)}}"> Delete </a></div>
                                    <br>
                                    <button style="margin-left: 12px" type="button" class="btn btn-danger"
                                            data-toggle="modal" data-target="#modal-danger">
                                        Delete-Model
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

{{--                <div class="cart-footer d-flex mt-30">--}}
{{--                    <div class="back-to-shop w-50">--}}
{{--                        <a href="shop-grid-left-sidebar.html">Continue shooping</a>--}}
{{--                    </div>--}}
{{--                    <div class="update-checkout w-50 text-right">--}}
{{--                        <a href="#">clear cart</a>--}}
{{--                        <a href="#">Update cart</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="coupon-code-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Cupon code</h5>
                        <p>Enter your cupone code</p>
                    </div>
                    <form action="#">
                        <input type="search" name="search" placeholder="#569ab15">
                        <button type="submit">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="shipping-method-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Shipping method</h5>
                        <p>Select the one you want</p>
                    </div>

                    <div class="custom-control custom-radio mb-30">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>Next day delivery</span><span>$4.99</span></label>
                    </div>

                    <div class="custom-control custom-radio mb-30">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio2"><span>Standard delivery</span><span>$1.99</span></label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-total-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Cart total</h5>
                        <p>Final info</p>
                    </div>

                    <ul class="cart-total-chart">
                        <li><span>Subtotal</span> <span>${{$total}}</span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span><strong>Total</strong></span> <span><strong>${{$total}}</strong></span></li>
                    </ul>
                    <a href="{{route('checkout',\Illuminate\Support\Facades\Auth::user()->id)}}" class="btn karl-checkout-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="pull-right">&times;</span></button>
                <h4 class="modal-title pull-left">Delete Cart</h4>
            </div>
            <div class="modal-body">
                <p>Confirmation message Of delete&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline" id="save_delete">Yes </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection



@section('JSLinks')

    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/js/single_custom.js"></script>
{{--    <script src="/js/singleProduct.js"></script>--}}
    <script src="/js/popper.min.js"></script>

    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
{{--    from the Admin LTE--}}
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <script>
        $("#save_delete").click((e)=>{
            e.preventDefault();
            alert("DELETE");

        })
    </script>
@endsection
