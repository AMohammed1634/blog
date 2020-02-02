// profile-image
$("#profile-image").click((e)=>{
    // alert("Ahmed")
    document.getElementById('image').click();
    document.getElementById('image').onchange = ()=>{
        document.getElementById('submit').click();
    }
})
let $arr = [
    $("#designed-products"),
    $("#shopping-carts")
];

$("#designed-products").click((e)=>{
    $(".right").css({
        "color":"#a9aaac",
        "background-color": "#292c31"
    });
    $(".left").css({
        "color":"#292c31",
        "background-color": "#292c31"
    })
    $("#designed-products").css({
        "color":"#ffffff",
        "background-color": "#2d3039"
    })
    $('#designed-products-left').css({
        "background-color": "#0a568c",
        "color": "#0a568c"
    })
    $("#designed-products-content").css({"display":"block"})
    $("#shopping-carts-content").css({"display":"none"})
    $("#orders-content").css({"display":"none"})
    for(var i=0;i<$arr.length;i++){

    }
})
$("#shopping-carts").click((e)=>{
    $(".right").css({
        "color":"#a9aaac",
        "background-color": "#292c31"
    });
    $(".left").css({
        "color":"#292c31",
        "background-color": "#292c31"
    })
    $("#shopping-carts").css({
        "color":"#ffffff",
        "background-color": "#2d3039"
    })
    $('#shopping-carts-left').css({
        "background-color": "#0a568c",
        "color": "#0a568c"
    })
    $("#designed-products-content").css({"display":"none"})
    $("#shopping-carts-content").css({"display":"block"})
    $("#orders-content").css({"display":"none"})
})



$("#orders").click((e)=>{
    $(".right").css({
        "color":"#a9aaac",
        "background-color": "#292c31"
    });
    $(".left").css({
        "color":"#292c31",
        "background-color": "#292c31"
    })
    $("#orders").css({
        "color":"#ffffff",
        "background-color": "#2d3039"
    })
    $('#orders-left').css({
        "background-color": "#0a568c",
        "color": "#0a568c"
    })
    $("#designed-products-content").css({"display":"none"})
    $("#shopping-carts-content").css({"display":"none"})
    $("#orders-content").css({"display":"block"})
//    orders-content
})



/**

 Orders Search

 */
$("#search").click((e)=>{
    e.preventDefault();
    alert("وبعدين ؟؟");
})
// document.getElementById('input-search').
$("#input-search").keyup((e)=>{
    let search = ($("#input-search").val());
    let arr = [];
    let str = $(".shopping_id_search").text();
    let index = str.indexOf(' ');
    let asd = document.getElementsByClassName('shopping_id_search');
    for (let i=0;i<asd.length;i++){
        arr[i] = asd[i].textContent;
    }
    console.log( arr);
})
