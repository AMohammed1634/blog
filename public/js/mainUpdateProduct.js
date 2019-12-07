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
            console.log(lastLeft+ "  "+ lastTop);
        },
        /**
         * whene stop element
         */
        stop:function(){

            var container = document.getElementById('img-container');
            console.log($(this).offset().top+"asd"+container.offsetTop);
            console.log($(this).offset().left+"asd"+container.offsetLeft);
            if(($(this).offset().top < container.offsetTop || $(this).offset().left < container.offsetLeft+159 )||
                ($(this).offset().top+77 > container.offsetTop+510 || $(this).offset().left+166 > container.offsetLeft+500+162 ))
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


                })
            }else{

            }
        }
    }).resizable({
        // resize from all edges and corners
        edges: { left: true, right: true, bottom: true, top: true },

        modifiers: [
            // keep the edges inside the parent
            $('.img-local').modifiers.restrictEdges({
                outer: 'parent',
                endOnly: true
            }),

            // minimum size
            $(".img-local").modifiers.restrictSize({
                min: { width: 100, height: 50 }
            })
        ],

        inertia: true
    })
        .on('resizemove', function (event) {
            var target = event.target
            var x = (parseFloat(target.getAttribute('data-x')) || 0)
            var y = (parseFloat(target.getAttribute('data-y')) || 0)

            // update the element's style
            target.style.width = event.rect.width + 'px'
            target.style.height = event.rect.height + 'px'

            // translate when resizing from top or left edges
            x += event.deltaRect.left
            y += event.deltaRect.top

            target.style.webkitTransform = target.style.transform =
                'translate(' + x + 'px,' + y + 'px)'

            target.setAttribute('data-x', x)
            target.setAttribute('data-y', y)
            target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height)
        });




} );
