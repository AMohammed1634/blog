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

            if(($(this).offset().top < container.offsetTop || $(this).offset().left < container.offsetLeft+200 )||
                ($(this).offset().top+77 > container.offsetTop+468 || $(this).offset().left+166 > container.offsetLeft+448+172 ))
            {
                console.log($(this).offset().top+"asd"+container.offsetTop);
                console.log($(this).offset().left+"asd"+container.offsetLeft);
                $(this).animate({
                    'position':'relative',
                    'top':'0',
                    'left' : '0'
                },750, ()=>{
                    /**
                     * make item resizable after dropped it
                     */
                    storeImageData($imgID,-1,-1,$width,$height);

                })
                $(this).css({"width":166,"height":77});
            }else{
                /**
                 * get the location of child image from the parent image
                 */
                storeImageData($imgID,$x,$y,$width,$height);
            }
        }
    });



} );
