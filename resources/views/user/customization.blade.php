{{--customization--}}



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>T-shirt Design Lab </title>
{{--    <link rel="stylesheet" href="/css/UpdateProduct.css">--}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/customization.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/bower_components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    {{--    include jquery-ui css /plugins/lquery-ui-1.12.1.custom/jquery-ui.--}}
    <link rel="stylesheet" href="/plugins/lquery-ui-1.12.1.custom/jquery-ui.css">
</head>
<body>

<nav>

</nav>
<div  class="centerArea">
    <div class="row">
        <div class="col-4">
            <div class="row controllerSide" >
                <div class="col-3 menu">
{{--                    Col-3--}}
                    <div class="menu_item" id="menu_item1">
                        <div class="vertical_line"></div>
                        <i class="fa fa-cloud-upload"></i><br>
                        Upload Art
                    </div>
                    <div class="menu_item" id="menu_item2">
                        <div class="vertical_line"></div>
                        <i class="fa fa-image"></i><br>
                        Choice Art
                    </div>
                    <div class="menu_item" id="menu_item3">
                        <div class="vertical_line"></div>
                        <i class="fa fa-chain"></i><br>
                        Change Color
                    </div>
                    <div class="menu_item" id="menu_item4">
                        <div class="vertical_line"></div>
                        <i class="fa fa-upload"></i><br>
                        Upload Art
                    </div>
                </div>
                <div class="col-9 menu_content">
{{--                    col-9 addImage --}}
                    <div class="menu_content" id="menu_content1">
                        <div class="upper_nav">
                            <i class="fa fa-close"></i>
                        </div>
                        <div class="upload" id="upload-image">
                            <i class="fa fa-cloud-upload"></i><br>
                            Browse An Item
                        </div>
                        <form action="{{route('addImage',$product->id)}}" method="post" style="display: none" id="form-upload-image" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="image">
                            <input type="submit" name="image-submit" id="image-submit">
                        </form>
                    </div>
                    <div class="menu_content" id="menu_content2">
                        <div class="upper_nav">
                            <i class="fa fa-close"></i>
                        </div>
                        <h2>Choice Art</h2>
                        @isset($images)
                            @foreach($images as $image)
                                <br style="clear: both">
                                <div class="layers-content" style="margin-top: 15px;margin-left: 15px">

                                    <div>
                                        <img id="{{$image->id}}" class="img-local" src="\storage\UpdatedProduct\{{$image->img}}" >
                                    </div>
                                    <div style="display: none">{{$image->id}}</div>

                                    <div class="controler" style="float: left"> <button class="left increaseX" index="{{$image->id}}">+ x</button><button class="right decreaseX" index="{{$image->id}}">- x</button></div>
                                    <br style="">
                                    <div class="controler" style="float: left"> <button class="left increaseY" index="{{$image->id}}">+ y</button><button class="right decreaseY" index="{{$image->id}}">- y</button></div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                    <div class="menu_content" id="menu_content3">
                        <div class="upper_nav">
                            <i class="fa fa-close"></i>
                        </div>
                        <h2>ASD3</h2>
                    </div>
                    <div class="menu_content" id="menu_content4">
                        <div class="upper_nav">
                            <i class="fa fa-close"></i>
                        </div>
                        <h2>ASD4</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            ASD
        </div>
        <div class="col-1">
            ASD
        </div>
    </div>
</div>




<output aria-live="polite"></output>

<script src="/js/jquery3.2.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>


</body>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"  ></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="/bower_components/admin-lte/dist/js/pages/dashboard.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="/bower_components/admin-lte/dist/js/demo.js"></script>

{{--include jquery UI --}}
<script src="/plugins/lquery-ui-1.12.1.custom/jquery-ui.js"  ></script>

<script src="/js/customization.js"></script>
</html>



