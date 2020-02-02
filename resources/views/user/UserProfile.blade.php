@extends('user.masterUser')

@section('links')
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/UserProfile.css">
{{--    Admin LTE--}}
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
@endsection


@section('body')

<div class="" style="padding-top:150px; ">
    <div class="header-section container">
        ASD
        <div class="local-image">
            <img src="/storage/profile_images/{{$user->img}}" title="change Image" id="profile-image">
            @guest

            @else
                @if(Auth::user()->id == $user->id)
                    <form action="{{route('changeImage',Auth::user()->id)}}" method="POST" id="form" enctype="multipart/form-data" style="display: none">
                        @csrf
                        <input type="file" name="image" id="image">
                        <input type="submit" name="submit" id="submit">
                    </form>
                    @endif
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
                    <div class="left" style="" id="orders-left">.</div>
                    <div class="right" id="orders">Orders </div>
                </div>
                <br style="clear: both">
                <div class="item-actions">
                    <div class="left"  id="shopping-carts-left" style="">.</div>
                    <div class="right" id="shopping-carts">Shopping Carts</div>
                </div>

                <br style="clear: both">
                <div class="item-actions">
                    <div class="left" style="">.</div>
                    <div class="right">Wish List</div>
                </div>
                <br style="clear: both">
                <div class="item-actions">
                    <div class="left" id="designed-products-left" style="">.</div>
                    <div class="right" id="designed-products">Designed Products</div>
                </div>
            </div>
            <div class="col-lg-10" style="padding-top: 30px">
                <div id="orders-content" style="display: none">
{{--                    {{$user->orders}}--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-header">--}}
{{--                            <h3 class="box-title pull-left">Orders </h3>--}}

{{--                            <div class="box-tools pull-right">--}}
{{--                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">--}}
{{--                                    <input type="text" name="table_search" id="input-search" class="form-control pull-right" placeholder="Search">--}}

{{--                                    <div class="input-group-btn">--}}
{{--                                        <button type="submit" class="btn btn-default" style="cursor: pointer"--}}
{{--                                        id="search" ><i class="fa fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.box-header -->--}}
{{--                        <div class="box-body table-responsive no-padding">--}}
{{--                            <table class="table table-hover">--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <th>Order Code</th>--}}
{{--                                    <th>Total Amount</th>--}}
{{--                                    <th>Date Time </th>--}}
{{--                                    <th>status</th>--}}
{{--                                </tr>--}}
{{--                                <tbody>--}}
{{--                                @foreach($user->orders as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$order->id}}</td>--}}
{{--                                        <td><a href="/checkout/{{$order->users->id}}/place_order/invoice_print/{{$order->id}}" class="shopping_id_search">{{$order->shopping_id}}</a></td>--}}
{{--                                        <td>${{$order->total_amount}}</td>--}}
{{--                                        <td><span class="label label-success">{{$order->created_at}}</span></td>--}}
{{--                                        <td class="">Deliver</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody></table>--}}
{{--                        </div>--}}
                        <!-- /.box-body -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="width: 100%">
                                    Orders
                                    <a class="btn btn-app pull-right">
                                        <span class="badge bg-teal">{{count($user->orders)}}</span>
                                        <i class="fa fa-inbox"></i> Orders
                                    </a>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

{{--                                    ASSD--}}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 180.033px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                        ID
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 226.283px;" aria-label="Browser: activate to sort column ascending">
                                                        Order Code
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 207.233px;" aria-label="Platform(s): activate to sort column ascending">
                                                        Total Amount
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 154.167px;" aria-label="Engine version: activate to sort column ascending">
                                                        Date Time
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.283px;" aria-label="CSS grade: activate to sort column ascending">
                                                        status
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->orders as $order)
                                                    <tr role="row" class="odd">
                                                        <td>{{$order->id}}</td>
                                                        <td><a href="/checkout/{{$order->users->id}}/place_order/invoice_print/{{$order->id}}" class="shopping_id_search">{{$order->shopping_id}}</a></td>
                                                        <td>${{$order->total_amount}}</td>
                                                        <td><span class="label label-success">{{$order->created_at}}</span></td>
                                                        <td class="">Deliver</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Order Code</th>
                                                    <th rowspan="1" colspan="1">Total Amount</th>
                                                    <th rowspan="1" colspan="1">Date Time</th>
                                                    <th rowspan="1" colspan="1">status</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
{{--                    </div>--}}
                </div>
                <div id="shopping-carts-content" style="display: none">
{{--                    Items In Cart--}}
{{--                    {{$user->shoppingCart->where('ordered','=',-1)}}--}}
                    @foreach($user->shoppingCart->where('ordered','=',-1) as $cart)
                        <div class="item-cart" >
                            <h4 style="color: #fe4c50">{{$cart->products->name}}</h4>
                            <p>{{$cart->products->description}}</p>
                            <div class="product_price">
                                @if($cart->products->discounted_price == 0)
                                    ${{$cart->products->price}}
                                @else
                                    ${{$cart->products->price}}
                                    <span>${{$cart->products->discounted_price}}</span>
                                @endif

                            </div>
                            <img src="/storage/product_images/{{$cart->products->img}}">
                            <div style="display: inline-block">
                                <input type="text" value="{{$cart->quantity}}" disabled style="width: 55px;">
                                <br>
                                <button><i class="fa fa-arrow-up"></i> </button>
                                <button><i class="fa fa-arrow-down"></i> </button>
                            </div>
                        </div>
                    @endforeach

{{--                    {{$user->shoppingCart->where('ordered','=',-1)}}--}}
                </div>
                <div id="designed-products-content">
                    <h2>Products </h2>
                    @foreach($user->updatedProducts as $product)
                        <div class="product" style="margin-top: 10px">
                            <img src="/storage/{{$product->img}}">
                            <div class="data">
                                <h3>Name : @if( is_null($product->name)) No Value @else {{$product->name }} @endif</h3>

                                <div class="product_price">@if( is_null($product->name)) price Not Avaliable @else {{$product->price }} @endif</div>
                                <BR><BR>
                                <h3>Designed At : <br> <input disabled type="datetime-local" value="{{($product->created_at) }}"></h3>
                                @if(is_null($product->price))
                                    <span style="bottom: 10px;right: 10px;position: absolute;color: #fe4c50;font-size: 10px"> Wait for check it from Sponser </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
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

{{--    Admin lte--}}
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection



