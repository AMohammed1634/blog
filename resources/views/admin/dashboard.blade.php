@extends('admin.masterAdmin')
@section('title')
    T-shirt D.L | Dashboard
@endsection

@section('styleLinks')

@endsection
@section("head-admin")
Dashboard
@endsection
@section('dashboard')
    class="active"
@endsection

@section('body')
    Ahmed
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box New Orders -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{count($orders)}}</h3>

                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{count($carts)}}<sup style="font-size: 20px">%</sup></h3>

                        <p>Sales</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart-outline"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{count($users)}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

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
                                <!-- Custom tabs (Charts with tabs)-->
                                <div class="nav-tabs-custom" style="cursor: move;">
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                            <svg height="300" version="1.1" width="625.667"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 style="overflow: hidden; position: relative; top: -0.633331px;">
                                                <desc>
                                                    Created with Raphaël 2.2.0
                                                </desc>
                                                <defs>

                                                </defs>
                                                <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                                      x="56.5"
                                                      y="260"
                                                      text-anchor="end"
                                                      font-family="sans-serif" font-size="12px"
                                                      stroke="none" fill="#888888" font-weight="normal">
                                                    <tspan dy="4">0</tspan>
                                                </text>
                                                <path style=""
                                                      fill="none"
                                                      stroke="#aaaaaa"
                                                      d="M69,260H600.667"
                                                      stroke-width="0.5">

                                                </path>
                                                <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                                      x="56.5"
                                                      y="201.25"
                                                      text-anchor="end"
                                                      font-family="sans-serif"
                                                      font-size="12px"
                                                      stroke="none"
                                                      fill="#888888" font-weight="normal">
                                                    <tspan dy="4">
                                                        7,500
                                                    </tspan>
                                                </text>
                                                <path style="" fill="none" stroke="#aaaaaa" d="M69,201.25H600.667" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="56.5" y="142.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">15,000</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M69,142.5H600.667" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="56.5" y="83.75" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">22,500</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M69,83.75H600.667" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="56.5" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4.000000000000028">30,000</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M69,25.00000000000003H600.667" stroke-width="0.5"></path><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="503.1193487241799" y="272.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4">2013</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="266.6793462940462" y="272.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4">2012</tspan></text><path style="fill-opacity: 1;" fill="#74a5c2" stroke="none" d="M69,218.23266666666666C83.85825151883354,218.74183333333332,113.57475455650062,221.7860625,128.43300607533416,220.26933333333335C143.2912575941677,218.75260416666669,173.00776063183477,208.35534699453552,187.8660121506683,206.09883333333335C202.5627609356015,203.86684699453554,231.95625850546782,204.11993750000002,246.653007290401,202.31533333333334C261.3497560753342,200.51072916666666,290.7432536452005,194.192947859745,305.4400024301337,191.662C320.2982539489672,189.10323952641167,350.0147569866343,181.84977083333334,364.87300850546785,181.9565C379.7312600243014,182.06322916666667,409.4477630619685,203.4213315118397,424.306014580802,192.51583333333332C439.0027633657352,181.72887317850638,468.3962609356015,101.61791988950276,483.09300972053467,95.18666666666667C497.62825577156747,88.82608655616943,526.6987478736331,134.67133653846153,541.2339939246659,141.3485C556.0922454434995,148.17404487179488,585.8087484811665,147.23525,600.667,149.1975L600.667,260L69,260Z" fill-opacity="1"></path><path style="" fill="none" stroke="#3c8dbc" d="M69,218.23266666666666C83.85825151883354,218.74183333333332,113.57475455650062,221.7860625,128.43300607533416,220.26933333333335C143.2912575941677,218.75260416666669,173.00776063183477,208.35534699453552,187.8660121506683,206.09883333333335C202.5627609356015,203.86684699453554,231.95625850546782,204.11993750000002,246.653007290401,202.31533333333334C261.3497560753342,200.51072916666666,290.7432536452005,194.192947859745,305.4400024301337,191.662C320.2982539489672,189.10323952641167,350.0147569866343,181.84977083333334,364.87300850546785,181.9565C379.7312600243014,182.06322916666667,409.4477630619685,203.4213315118397,424.306014580802,192.51583333333332C439.0027633657352,181.72887317850638,468.3962609356015,101.61791988950276,483.09300972053467,95.18666666666667C497.62825577156747,88.82608655616943,526.6987478736331,134.67133653846153,541.2339939246659,141.3485C556.0922454434995,148.17404487179488,585.8087484811665,147.23525,600.667,149.1975" stroke-width="3"></path><circle cx="69" cy="218.23266666666666" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="128.43300607533416" cy="220.26933333333335" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="187.8660121506683" cy="206.09883333333335" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="246.653007290401" cy="202.31533333333334" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="305.4400024301337" cy="191.662" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="364.87300850546785" cy="181.9565" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="424.306014580802" cy="192.51583333333332" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="483.09300972053467" cy="95.18666666666667" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="541.2339939246659" cy="141.3485" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="600.667" cy="149.1975" r="4" fill="#3c8dbc" stroke="#ffffff" style="" stroke-width="1"></circle><path style="fill-opacity: 1;" fill="#eaf3f6" stroke="none" d="M69,239.11633333333333C83.85825151883354,238.897,113.57475455650062,240.43820833333334,128.43300607533416,238.239C143.2912575941677,236.03979166666667,173.00776063183477,222.49635428051002,187.8660121506683,221.52266666666668C202.5627609356015,220.55956261384335,231.95625850546782,232.3502916666667,246.653007290401,230.49183333333335C261.3497560753342,228.633375,290.7432536452005,208.50817190346083,305.4400024301337,206.655C320.2982539489672,204.7814635701275,350.0147569866343,213.63645833333334,364.87300850546785,215.585C379.7312600243014,217.53354166666668,409.4477630619685,231.50074954462661,424.306014580802,222.24333333333334C439.0027633657352,213.08654121129328,468.3962609356015,147.70467656537753,483.09300972053467,141.92816666666667C497.62825577156747,136.21513489871086,526.6987478736331,169.85397847985348,541.2339939246659,176.28516666666667C556.0922454434995,182.85927014652015,585.8087484811665,189.53329166666668,600.667,193.94933333333336L600.667,260L69,260Z" fill-opacity="1"></path><path style="" fill="none" stroke="#a0d0e0" d="M69,239.11633333333333C83.85825151883354,238.897,113.57475455650062,240.43820833333334,128.43300607533416,238.239C143.2912575941677,236.03979166666667,173.00776063183477,222.49635428051002,187.8660121506683,221.52266666666668C202.5627609356015,220.55956261384335,231.95625850546782,232.3502916666667,246.653007290401,230.49183333333335C261.3497560753342,228.633375,290.7432536452005,208.50817190346083,305.4400024301337,206.655C320.2982539489672,204.7814635701275,350.0147569866343,213.63645833333334,364.87300850546785,215.585C379.7312600243014,217.53354166666668,409.4477630619685,231.50074954462661,424.306014580802,222.24333333333334C439.0027633657352,213.08654121129328,468.3962609356015,147.70467656537753,483.09300972053467,141.92816666666667C497.62825577156747,136.21513489871086,526.6987478736331,169.85397847985348,541.2339939246659,176.28516666666667C556.0922454434995,182.85927014652015,585.8087484811665,189.53329166666668,600.667,193.94933333333336" stroke-width="3"></path><circle cx="69" cy="239.11633333333333" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="128.43300607533416" cy="238.239" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="187.8660121506683" cy="221.52266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="246.653007290401" cy="230.49183333333335" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="305.4400024301337" cy="206.655" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="364.87300850546785" cy="215.585" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="424.306014580802" cy="222.24333333333334" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="483.09300972053467" cy="141.92816666666667" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="541.2339939246659" cy="176.28516666666667" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle><circle cx="600.667" cy="193.94933333333336" r="4" fill="#a0d0e0" stroke="#ffffff" style="" stroke-width="1"></circle></svg><div class="morris-hover morris-default-style" style="left: 19px; top: 153px; display: none;"><div class="morris-hover-row-label">2011 Q1</div><div class="morris-hover-point" style="color: #a0d0e0">
                                                    Item 1:
                                                    2,666
                                                </div><div class="morris-hover-point" style="color: #3c8dbc">
                                                    Item 2:
                                                    2,666
                                                </div></div></div>
                                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                            <svg height="300" version="1.1" width="655.667"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 style="overflow: hidden; position: relative;">
                                                <desc>Created with Raphaël 2.2.0</desc>
                                                <defs></defs>
                                                <path style="opacity: 0;" fill="none"
                                                      stroke="#3c8dbc"
                                                      d="M327.8335,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,416.0612551949771,180.44625304313007"
                                                      stroke-width="2" opacity="0">

                                                </path><path style="" fill="#3c8dbc" stroke="#ffffff" d="M327.8335,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,418.8971473262442,181.4248826052307L455.4486459070204,194.03833029452744A135,135,0,0,1,327.8335,285Z" stroke-width="3"></path><path style="opacity: 1;" fill="none" stroke="#f56954" d="M416.0612551949771,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,244.11834627831414,108.73398312817662" stroke-width="2" opacity="1"></path><path style="" fill="#f56954" stroke="#ffffff" d="M418.8971473262442,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,241.42750205154567,107.40757544301087L202.26076941747118,88.10097469226493A140,140,0,0,1,460.17513279246566,195.6693795646951Z" stroke-width="3"></path><path style="opacity: 0;" fill="none" stroke="#00a65a" d="M244.11834627831414,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,327.80417846904885,243.333328727518" stroke-width="2" opacity="0"></path><path style="" fill="#00a65a" stroke="#ffffff" d="M241.42750205154567,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,327.80323599126825,246.3333285794739L327.7910884998742,284.9999933380171A135,135,0,0,1,206.74550979541863,90.31165416754118Z" stroke-width="3"></path><text style="text-anchor: middle; font-family: &quot;Arial&quot;; font-size: 15px; font-weight: 800;" x="327.8335" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" font-weight="800" transform="matrix(1,0,0,1,0,0)"><tspan dy="140">In-Store Sales</tspan></text><text style="text-anchor: middle; font-family: &quot;Arial&quot;; font-size: 14px;" x="327.8335" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" transform="matrix(1,0,0,1,0,0)"><tspan dy="160">30</tspan></text></svg></div>
                                    </div>
                                </div>
                                <!-- /.nav-tabs-custom -->

                                <!-- Chat box -->

                                <!-- /.box -->

                                <!-- quick email widget -->


                            </section>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <!-- Info Boxes Style 2 -->
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Inventory</span>
                                        <span class="info-box-number">5,200</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 50%"></div>
                                        </div>
                                        <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Mentions</span>
                                        <span class="info-box-number">92,050</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Downloads</span>
                                        <span class="info-box-number">114,381</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                        <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Direct Messages</span>
                                        <span class="info-box-number">163,921</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 40%"></div>
                                        </div>
                                        <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
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
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">

                <!-- /.box -->
                <div class="row">

                    <!-- /.col -->

                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Admin Members</h3>

                                <div class="box-tools pull-right">
                                    <span class="label label-danger">{{count($admins)}} Amin Members</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach($admins as $admin )
                                        <li>
                                            <img src="/storage/profile_images/{{$admin->img}}" alt="User Image"
                                            style="width: 128px;height: 128px">
                                            <a class="users-list-name" href="#">{{$admin->name}}</a>
                                            <span class="users-list-date">{{$admin->created_at}}</span>
                                        </li>
                                    @endforeach

                                    <li>
                                        <img src="/dist/img/user3-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Nadia</a>
                                        <span class="users-list-date">15 Jan</span>
                                    </li>
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Users</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order Code</th>
                                        <th>Total Amount</th>
                                        <th>Date Time </th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <a href="{{route('invoice_print',[$order->users->id, $order->id])}}" target="_blank">
                                                {{$order->shopping_id}}
                                            </a>
                                        </td>
                                        <td>${{$order->total_amount}}</td>
                                        <td><span class="label label-success">{{$order->created_at}}</span></td>
                                        <td>
                                            <a href="{{route('viewProfile',$order->users->id)}}">{{$order->users->name}}</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    if($i>=3)
                                        break;
                                    ?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="{{route("allOrders")}}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">



                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Updated Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php

                            $i=0;
                            ?>
                            @foreach($updatedProducts as $product)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="/storage/{{$product->img}}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        @if(is_null($product->name))
                                            <a href="javascript:void(0)" class="product-title">
                                                Need  Details
                                                <span class="label label-warning pull-right">${{$product->price}}</span>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="product-title">
                                                {{$product->name}}
                                                <span class="label label-warning pull-right">${{$product->price}}</span>
                                            </a>
                                        @endif

                                        <span class="product-description">
{{--                                            <a href="#" class="btn btn-primary">Update</a>--}}
                                        </span>
                                    </div>
                                </li>
                                <?php $i++; ?>
                                @if($i>=4)
                                    @break
                                @endif

                            @endforeach
                        <!-- /.item -->
{{--                            <li class="item">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="/dist/img/default-50x50.gif" alt="Product Image">--}}
{{--                                </div>--}}
{{--                                <div class="product-info">--}}
{{--                                    <a href="javascript:void(0)" class="product-title">Bicycle--}}
{{--                                        <span class="label label-info pull-right">$700</span></a>--}}
{{--                                    <span class="product-description">--}}
{{--                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.--}}
{{--                        </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}


                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{route('allUpdatedProducts')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->

                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($products as $product)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="/storage/product_images/{{$product->img}}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$product->name}}
                                            <span class="label label-warning pull-right">${{$product->price}}</span></a>
                                        <span class="product-description">
                                          {{$product->description}}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="/dist/img/default-50x50.gif" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Bicycle
                                        <span class="label label-info pull-right">$700</span></a>
                                    <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('JSLinks')
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

@endsection
