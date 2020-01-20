var $menuItem =[$("#menu_item1"),$("#menu_item2"),$("#menu_item3"),$("#menu_item4")];
var $menuContent = [
    $("#menu_content1"),
    $("#menu_content2"),
    $("#menu_content3"),
    $("#menu_content4")
];
for (var i=1;i<4;i++){
    $menuContent[i].css({"display":"none"});
}



$menuItem[0].click((e)=>{
    $menuItem[0].css({"background-color":"#FFF","color":"#8F8F8F","border":"1px sloid #DDD"});
    $menuContent[0].css({"display":"block"});
    let $child = $menuItem[0].children()[0];
    console.log($child);
    $child.style.backgroundColor = "#721c24";

    for(var i=1;i<4;i++){
        $menuItem[i].css({"background-color":"#1b1e21","color":"#8F8F8F","border":"1px sloid #DDD"});
        $menuContent[i].css({"display":"none"});
        let $child = $menuItem[i].children()[0];
        console.log($child);
        $child.style.backgroundColor = "#1b1e21";
    }
});
$menuItem[1].click((e)=>{
    $menuItem[1].css({"background-color":"#FFF","color":"#8F8F8F","border":"1px sloid #DDD"});
    $menuContent[1].css({"display":"block"});
    let $child = $menuItem[1].children()[0];
    console.log($child);
    $child.style.backgroundColor = "#721c24";
    for(var i=0;i<4;i++){
        if(i==1)
            continue;
        $menuContent[i].css({"display":"none"});

        $menuItem[i].css({"background-color":"#1b1e21","color":"#8F8F8F","border":"1px sloid #DDD"});
        let $child = $menuItem[i].children()[0];
        console.log($child);
        $child.style.backgroundColor = "#1b1e21";
    }
});
$menuItem[2].click((e)=>{
    $menuItem[2].css({"background-color":"#FFF","color":"#8F8F8F","border":"1px sloid #DDD"});
    $menuContent[2].css({"display":"block"});
    let $child = $menuItem[2].children()[0];
    console.log($child);
    $child.style.backgroundColor = "#721c24";
    for(var i=0;i<4;i++){
        if(i==2)
            continue;
        $menuContent[i].css({"display":"none"});

        $menuItem[i].css({"background-color":"#1b1e21","color":"#8F8F8F","border":"1px sloid #DDD"});
        let $child = $menuItem[i].children()[0];
        console.log($child);
        $child.style.backgroundColor = "#1b1e21";
    }
});
$menuItem[3].click((e)=>{
    $menuItem[3].css({"background-color":"#FFF","color":"#8F8F8F","border":"1px sloid #DDD"});
    $menuContent[3].css({"display":"block"});
    let $child = $menuItem[3].children()[0];
    console.log($child);
    $child.style.backgroundColor = "#721c24";
    for(var i=0;i<3;i++){
        $menuContent[i].css({"display":"none"});

        $menuItem[i].css({"background-color":"#1b1e21","color":"#8F8F8F","border":"1px sloid #DDD"});
        let $child = $menuItem[i].children()[0];
        console.log($child);
        $child.style.backgroundColor = "#1b1e21";
    }
});
/**
 * hidden form
 */
var $upload_image = $('#upload-image');
$upload_image.on('click',function (e) {
    var $file_img = ($('#image'));
    $file_img.click();
});
$('#image').change( ()=> {
    document.getElementById('form-upload-image').submit();
    console.log("asd");
});
/**
 * make item draguple
 */
$(function () {
    $(".img-local").draggable({
        cursor: "move",
        start:function(){

            console.log("Start");
        },
        stop:function () {
            console.log("Stop");
        }
    })
})
