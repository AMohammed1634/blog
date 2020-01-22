{{--customization--}}



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>T-shirt Design Lab {{$product->name}}</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/UpdateProduct.css">
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

    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.css">
{{--    include jquery-ui css /plugins/lquery-ui-1.12.1.custom/jquery-ui.--}}
    <link rel="stylesheet" href="/plugins/lquery-ui-1.12.1.custom/jquery-ui.css">
</head>
<body>


    <div class="">
{{--        alert-faild--}}
        <div class="row " id="alert" style="display:none;z-index: 1021">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Sucess</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    The Layer IS Added Sucessfully
                    <button type="button" class="btn btn-outline-success" data-widget="remove"
                            style="margin-left: 50px"> OK</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="row " id="alert-faild" style="display:none;z-index: 1021">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Sucess</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    Error
                    <button type="button" class="btn btn-outline-success" data-widget="remove"
                            style="margin-left: 50px"> OK</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="row row-content">
            <div class="col-lg-3 left-side">
                <div class="row">
                    <div class="col-lg-3 icons">
                        <div id="addText">
                            <i class="fa fa-text-width"></i>
                        </div>
                        <div id="addText">
                            <i class="fa fa-image"></i>
                        </div>
                    </div>
                    <div class="col-lg-9" style="padding: 0px">
                        <div id="addTextForm" style="display: none">

                            <div class="box-header with-border">
                                <h3 class="box-title">Add Text</h3>
                            </div>
                            <img class="ro" src="/customization/row.png">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Text</label>

                                        <div class="">
                                            <input type="text" class="form-control" id="text" placeholder="Text" style="border: none;width: 100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Color picker:</label>
                                        <input type="color" id="color" class="form-control my-colorpicker1 colorpicker-element">
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer" style="background-color: #292c31;border-top: none">

                                    <button type="submit" class="btn btn-info pull-left" id="testAddText">Test It</button>
                                    <button  class="btn btn-info pull-right" id="addText">Add Text</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{--Center Area--}}
            <div class="col-lg-6 design-area" id="parent-product">

                <img src="/storage/product_images/{{$product->img}}" class="img-container" id="img-container">
                <div id="textToDesplay">AhmedMahrous</div>
                <nav class="navbar navbar-light" style="">
                    <!-- Navbar content -->
                    <div>
                        <ul class="navbar navbar-default">
                            <li class="nav-item nav-link "  > ASD</li>
                            <li class="nav-item nav-link btn btn-primary " style="float: right" id="btn-save">Save </li>
{{--                            http://127.0.0.1:8000//saveDesign/31--}}

                        </ul>
                    </div>
                </nav>
            </div>
            {{--End Center Area--}}
            <div class="col-lg-3 -align-right myRight" id="layers" style="padding: 0px">
                <h1 class="layer">Layers</h1>
                <img class="ro" src="/customization/row.png">
                <form action="{{route('addImage',$product->id)}}" method="post" style="display: none" id="form-upload-image" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="image">
                    <input type="submit" name="image-submit" id="image-submit">
                </form>
                <div class="layers-content" id="layers-content" style="cursor: pointer">
                    <div class="upload" id="upload-image">

                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <output aria-live="polite"></output>

    <script src="/js/jquery3.2.1.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</body>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
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
<!-- bootstrap color picker -->
<script src="/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
{{--include jquery UI --}}
<script src="/plugins/lquery-ui-1.12.1.custom/jquery-ui.js"></script>


<!-- Select2 -->
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/bower_components/admin-lte/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>



<script src="/js/mainUpdateProduct.js"></script>

</html>

<script>


</script>
@isset($images)
    <script>
        var width=166,height=77;
        // $('#alert').css({'display':'block'});
        var $layers = $('#layers');
        let lengthImage = "<?php echo $images->count() ?>";
        lengthImage = parseInt(lengthImage);
        console.log(typeof lengthImage);
        var images = '<?php echo json_encode($images); ?>';
        console.log(images);
        images = JSON.parse(images);
        console.log(images);
        for(var i=0;i<lengthImage;i++){
            $layers.append('<br style="clear: both">' +
                '<div class="layers-content" style="margin-top: 15px">\n' +
                '                    <div class="upload" >\n' +
                '\n' +
                '                        <img id="'+images[i].id+'" class="img-local" src="\\storage\\UpdatedProduct\\'+ images[i].img +'" >\n' +
                '<div style="display: none">'+images[i].id+'</div>' +
                '                    </div>\n' +
                '<div class="controler" style="float: left"> <button class="left increaseX" index="'+images[i].id+'">+ x</button><button class="right decreaseX" index="'+images[i].id+'">- x</button></div>' +
                '<br style="">' +
                '<div class="controler" style="float: left"> <button class="left increaseY" index="'+images[i].id+'">+ y</button><button class="right decreaseY" index="'+images[i].id+'">- y</button></div>' +
                '                </div>');

        }
        $('.img-local').css({
            'width':'166px',
            'height':'77px',
        })

        /**
         resize images

         */
        $(".increaseX").click((e)=>{

            console.log(e.target.getAttribute("index"))
            var $img = $("#"+e.target.getAttribute("index"));
            $img.css({"width":++width});

            let $y = ($img.offset().top - $("#img-container").offset().top);
            let $x = $img.offset().left - $("#img-container").offset().left;
            let $width = $img.outerWidth();
            let $height = $img.outerHeight();
            let $imgID = e.target.getAttribute("index");
            console.log($width+"  "+$height)
            storeImageData($imgID,$x,$y,$width,$height);
        })
        $(".decreaseX").click((e)=>{
            console.log(e.target.getAttribute("index"))
            var $img = $("#"+e.target.getAttribute("index"));
            $img.css({"width":--width});

            let $y = ($img.offset().top - $("#img-container").offset().top);
            let $x = $img.offset().left - $("#img-container").offset().left;
            let $width = $img.outerWidth();
            let $height = $img.outerHeight();
            let $imgID = e.target.getAttribute("index");
            console.log($width+"  "+$height)
            storeImageData($imgID,$x,$y,$width,$height);
        })

        $(".increaseY").click((e)=>{

            console.log(e.target.getAttribute("index"))
            var $img = $("#"+e.target.getAttribute("index"));
            $img.css({"height":++height});

            let $y = ($img.offset().top - $("#img-container").offset().top);
            let $x = $img.offset().left - $("#img-container").offset().left;
            let $width = $img.outerWidth();
            let $height = $img.outerHeight();
            let $imgID = e.target.getAttribute("index");
            console.log($width+"  "+$height)
            storeImageData($imgID,$x,$y,$width,$height);
        })
        $(".decreaseY").click((e)=>{
            console.log(e.target.getAttribute("index"))
            var $img = $("#"+e.target.getAttribute("index"));
            $img.css({"height":--height});

            let $y = ($img.offset().top - $("#img-container").offset().top);
            let $x = $img.offset().left - $("#img-container").offset().left;
            let $width = $img.outerWidth();
            let $height = $img.outerHeight();
            let $imgID = e.target.getAttribute("index");
            console.log($width+"  "+$height)
            storeImageData($imgID,$x,$y,$width,$height);
        })
        function pushShanges(){

        }
    </script>
@endisset


<script>

    function storeImageData(imgID,x,y,width,height){
        $.ajax({
            "type":"get",
            "url":"http://127.0.0.1:8000/updateRow/{{$product->id}}",
            "data":{
                "imgID":imgID,
                "x" :x,
                "y":y,
                "width":width,
                "height":height
            },
            "success":function (resopnse) {
                console.log(resopnse);
            }
        })
    }


    /**
     * call to API To Save Changes
     */
    $("#btn-save").click(function (){
        $.ajax({
            "url":"http://127.0.0.1:8000//saveDesign/{{$product->id}}",
            "method":"GET",
            "success":function (e) {
                alert(e);
                console.log(e);
            }
        })
        console.log()
    });
    /**
     * add text
     */

</script>

