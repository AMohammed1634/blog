@extends('admin.masterAdmin')
@section('title')
    T-shirt D.L | Dashboard >> Customized Products
@endsection

@section('styleLinks')
{{--<link href="/css/appBootstrap.css" rel="stylesheet"/>--}}
@endsection
@section("head-admin")
    Dashboard
@endsection
@section('dashboard')
    class="active"
@endsection

@section('body')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Hover Data Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row" style="width: 100%">
                <div class="col-sm-6" style="width: 100%"></div><div class="col-sm-6"></div></div>
            <div class="row" style="width: 100%">
                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                ID
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                price
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                Image
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                User(s)
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                Action </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($updatedProducts as $product)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $product->id }}</td>
                            <td class="sorting_1" class="price" id="price{{$product->id}}">
                                {{ $product->price }}
                            </td>
                            <td>
                                <img src="/storage/{{$product->img}}"
                                style="width: 250px"/>
                            </td>
                            <td>{{$product->user->name}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->id}}" data-whatever="@mdo">Change Price</button>

                                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Enter New Date</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/admin/dashboard/allUpdatedProducts/{{ $product->id }}/save">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">New Price</label>
                                                        <input type="text" name="price" class="form-control" id="recipient-name">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send Data</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--- -->
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">ID</th>
                            <th rowspan="1" colspan="1">price</th>
                            <th rowspan="1" colspan="1">Image</th>
                            <th rowspan="1" colspan="1">User</th>
                            <th rowspan="1" colspan="1">
                                Action
                            </th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            {{$updatedProducts->links()}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-5">--}}
{{--                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">--}}
{{--                        Showing 1 to 10 of 57 entries--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-7">--}}
{{--                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="paginate_button previous disabled" id="example2_previous">--}}
{{--                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">--}}
{{--                                    Previous--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>--}}
    </div>
    <!-- /.box-body -->
</div>


@endsection

<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script src="/bower_components/jquery/dist/jquery.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
    <script src="/js/jquery3.2.1.min.js">

    </script>
<script>
    $(".price").click(()=>{
        alert("ASD");
    })

</script>

