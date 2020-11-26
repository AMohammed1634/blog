@extends('admin.masterAdmin')

@section('title')
    T-shirt D.L | Products
@endsection

@section('styleLinks')

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">

    <style>
        .account_selection li a{
            display: inline;
        }
        .navbar-static-top{
            height: 51px;

        }
        .navbar-custom-menu{
            display: none;
        }
        .sidebar-toggle{
            display: none;
        }
    </style>
@endsection

@section('body')



<div id="orders-content" style="display: block;">

    <!-- /.box-body -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="width: 100%">
                Products
                <a class="btn btn-app pull-right">
                    <span class="badge bg-teal">{{count($products)}}</span>
                    <i class="fa fa-inbox"></i> Products
                </a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">


                <div class="row">
                    <div class="col-sm-12">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 180.033px;" aria-label="
                                                        ID
                                                    : activate to sort column descending" aria-sort="ascending">
                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 226.283px;" aria-label="
                                                        Order Code
                                                    : activate to sort column ascending">
                                                Product Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 207.233px;" aria-label="
                                                        Total Amount
                                                    : activate to sort column ascending">
                                                Price
                                            </th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 154.167px;" aria-label="
                                                        Date Time
                                                    : activate to sort column ascending">
                                                Discount
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.283px;" aria-label="
                                                        status
                                                    : activate to sort column ascending">
                                                action
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.283px;" aria-label="
                                                        status
                                                    : activate to sort column ascending">
                                                Update Colors
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($products as $product)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$product->id}}</td>
                                            <td>
                                                <a href="{{route("viewProduct",[$product->id])}}" class="shopping_id_search">
                                                    {{$product->name}}</a>
                                            </td>
                                            <td>${{$product->price}}</td>
                                            <td><span class="label label-danger">$
                                                    @if($product->discounted_price == 0)
                                                        0.00
                                                    @else
                                                        {{$product->price - $product->discounted_price}}
                                                    @endif
                                                </span></td>
                                            <td class="">
                                                <a href="{{route("products.update_product",[$product->id])}}" >Update Product</a>
                                                <br>
                                                <a href="{{route("products.delete_product",[$product->id])}}" class="btn btn-danger">Delete</a>
                                            </td>
                                            <td>
                                                <a href="{{route("products.add_color",[$product->id])}}" class="btn btn-outline-primary">Add colors</a>
                                                <br>
                                                <a href="" class="btn btn-outline-primary">Add Size</a>
                                            </td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                        <tfoot>
                                        <tr><th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">price</th>
                                            <th rowspan="1" colspan="1">discount</th>
                                            <th rowspan="1" colspan="1">action</th></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.box-body -->
    </div>

</div>

@endsection

@section('JSLinks')
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="/js/categories_custom.js"></script>

    <script src="/js/categoriesFunctions.js"></script>
    <script src="/js/jquery3.2.1.min.js"></script>
    <script src="/js/UserProfile.js"></script>


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
