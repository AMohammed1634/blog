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
let f = 0;
$addText.click((e)=>{
    if(f==0) {
        $("#addTextForm").css({"display": "block"});
        $addText.css({"color": "#FFF", "background-color": "#2d3039"})
        f=1;
    }else{
        $("#addTextForm").css({"display": "none"});
        $addText.css({"color": "#a9aaac", "background-color": "#292c31"})
        f=0
    }
})

//Colorpicker
$('.my-colorpicker1').colorpicker()
//color picker with addon
$('.my-colorpicker2').colorpicker()


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
let flag = 0;
$("#bold").click((e)=>{
    if(flag==0) {
        $("#bold").css({
            "background-color": "#8F8F8F",
            "color": "#FFF"
        });
        $("#textToDesplay").css({
            "font-weight": "bold"
        })
        flag = 1
    }else{
        $("#bold").css({
            "background-color": "#292c31",
            "color": "#a9aaa0"
        });
        $("#textToDesplay").css({
            "font-weight": "normal"
        })
        flag = 0
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
//         "url":"/addText/{{$product->id}}",
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
