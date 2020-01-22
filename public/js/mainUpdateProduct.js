var $upload_image = $('#upload-image');
$upload_image.on('click',function (e) {
    var $file_img = ($('#image'));
    $file_img.click();
});
$('#image').change( ()=> {
    document.getElementById('form-upload-image').submit();
    console.log("asd");
});
$(function () {

})
$( function() {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    var lastLeft,lastTop;
    $( ".img-local" ).draggable({
        cursor: "move",
        start:function(event,ui){
            lastLeft = $(this).offset().left;
            lastTop = $(this).offset().top;
            var container = document.getElementById('img-container');

            console.log($(this).offset().top+"asd"+container.offsetTop);
            console.log($(this).offset().left+"asd"+container.offsetLeft);
        },
        /**
         * whene stop element
         */
        stop:function(){
            // alert($(this).offset().top+"  "+$(this).offset().left);
            // alert( );
            var $y = ($(this).offset().top - $("#img-container").offset().top);
            var $x = $(this).offset().left-$("#img-container").offset().left;
            var $width = $(this).outerWidth();
            var $height = $(this).outerHeight();
            var $widthContainer = $('.img-container').outerWidth();
            var $heightContainer = $(".img-container").outerHeight();
            var $imgID = $(this).siblings().text();

            var container = document.getElementById('img-container');
            console.log($(this).offset().top+" asd "+container.offsetTop);
            console.log($(this).offset().left+" asd "+container.offsetLeft);

            if(($(this).offset().top < container.offsetTop || $(this).offset().left < container.offsetLeft+332 )||
                ($(this).offset().top+$height > container.offsetTop+$heightContainer || $(this).offset().left+$width > container.offsetLeft+$widthContainer+327  ))
            {
                console.log($(this).offset().top+"asd"+container.offsetTop);
                console.log($(this).offset().left+"asd"+container.offsetLeft);
                $(this).animate({
                    'position':'relative',
                    'top':'0',
                    'left' : '0',
                    "width":166,
                    "height":77
                },750, ()=>{
                    /**
                     * make item resizable after dropped it
                     */
                    storeImageData($imgID,-1,-1,$width,$height);

                })
                // $(this).css({"width":166,"height":77});
            }else{
                /**
                 * get the location of child image from the parent image
                 */
                storeImageData($imgID,$x,$y,$width,$height);
            }
        }
    });



} );
/**


 */
let $addText = $("#addText");
$addText.click((e)=>{
    $("#addTextForm").css({"display":"block"});
    $addText.css({"color":"#FFF","background-color":"#2d3039"})
})

//Colorpicker
$('.my-colorpicker1').colorpicker()
//color picker with addon
$('.my-colorpicker2').colorpicker()

$("#testAddText").click((e)=>{
    e.preventDefault();
    e.preventDefault();
    let x = $("#textToDesplay").offset().left - $("#img-container").offset().left,
        y = $("#textToDesplay").offset().top - $("#img-container").offset().top;
    let width = $("#textToDesplay").outerWidth(),
        height = $("#textToDesplay").outerHeight(),
        txt = $("#text").val(),
        color = $("#color").val();
    let data = {
        "txt":txt,
        "color":color,
        "x" :x,
        "y":y,
        "width":width,
        "height":height
    };
    console.log(data);
    $.ajax({
        "type":"get",
        "url":"http://127.0.0.1:8000/addText/1",
        "data":data,
        "success":function (resopnse) {
            console.log(resopnse);
        }
    })
})

$("#text").keyup((e)=>{
    console.log("A&A");
    // document.getElementById("testAddText").click();
    let color = $("#color").val();
    console.log($("#color").val());
    let img = $("#img-container");
    let img_parent = $("#parent-product")
    $("#textToDesplay").text($("#text").val()).css({
        "color":color,
        "display":"block"
    })
})
document.getElementById("color").onchange = function(){
    // document.getElementById("testAddText").click();
    let color = $("#color").val();
    console.log($("#color").val());
    let img = $("#img-container");
    let img_parent = $("#parent-product")
    $("#textToDesplay").text($("#text").val()).css({
        "color":color,
        "display":"block"
    })
}
$("#textToDesplay").draggable({
    cursor: "move",
    start:function(event,ui){
        console.log("Start")
    },
    stop:function(){
        console.log("Stop")
        console.log($(this).offset().top+"  -txt-  "+$(this).offset().left)
        console.log($("#img-container").offset().top+"  --  "+$("#img-container").offset().left)
        let x = $(this).offset().left - $("#img-container").offset().left,
            y = $(this).offset().top - $("#img-container").offset().top;
        let width = $(this).outerWidth,
            height = $(this).outerHeight,
            txt = $("#text").val(),
            color = $("#color").val();
        console.log("x : "+x + "  y: "+y)
        if($(this).offset().top < $("#img-container").offset().top){
            $("#textToDesplay").animate({
                "top":$("#img-container").offset().top
            },100)
        }
        if($(this).offset().left < $("#img-container").offset().left){
            $("#textToDesplay").animate({
                "left":36
            },100)
        }
    }
})


//
// $("#addText").click((e)=>{
//     e.preventDefault();
//     let x = $("#textToDesplay").offset().left - $("#img-container").offset().left,
//         y = $("#textToDesplay").offset().top - $("#img-container").offset().top;
//     let width = $("#textToDesplay").outerWidth,
//         height = $("#textToDesplay").outerHeight,
//         txt = $("#text").val(),
//         color = $("#color").val();
//     $.ajax({
//         "type":"get",
//         "url":"http://127.0.0.1:8000/addText/{{$product->id}}",
//         "data":{
//             "txt":txt,
//             "color":color,
//             "x" :x,
//             "y":y,
//             "width":width,
//             "height":height
//         },
//         "success":function (resopnse) {
//             console.log(resopnse);
//         }
//     })
// })
