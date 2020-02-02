@extends('admin.masterAdmin')
@section('title')
    T-shirt D.L | Related Products
@endsection

@section('styleLinks')

@endsection

@section('FPTree')
    class="active"
@endsection

@section('body')
{{--{{$patterns}}--}}
{{--    <br>--}}
{{--    {{$rules}}--}}
    <?php

    ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Related Products</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <section class="col-md-8 connectedSortable ui-sortable">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="width: 100%">
                                    Rules

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
                                                        Association Rules
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 226.283px;" aria-label="Browser: activate to sort column ascending">
                                                        Confidence
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rules as $rule)
                                                    <tr role="row" class="odd">

                                                        <td>{{$rule[0]}} --->  {{$rule[1]}}</td>
                                                        <td>{{($rule[2] * 100)}} %</td>

                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Order Code</th>

                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </section>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title pull-left">Frequent Patterns </h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Pattern</th>
                                        <th>Support</th>

                                    </tr>
                                    <tbody>
                                    @foreach($patterns as $pattern => $support)
                                        <tr>
                                            <td>{{$pattern}}</td>
                                            <td><span class="label label-success">{{$support}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody></table>
                            </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->

            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('JSLinks')

@endsection
