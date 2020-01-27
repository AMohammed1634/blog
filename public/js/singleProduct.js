




/**
 *
 * @param url => url of API
 * @param method => method Requests
 * @param data => JSON data whose sent
 */
function callAPI(url, method, data) {
    $.ajax({
        "type":method,
        "url":url,
        "data":data,
        "success":function (resopnse) {
            console.log(resopnse);
            // alert(resopnse[1]);
            let json = ( resopnse);
            console.log(json[1]);
            console.log(json[0]);
            /**
             * add an alert Message to display status
             */
            if(json[0] != "msg"){
                document.getElementById('checkout_items').innerText = json[0];
            }else {
                alert('This Item Is Alredy Added to your list ');
            }
        }
    })
}
/**
 *
 * make the rating of love
 */
var $star = [
    $("#star0"),
    $("#star1"),
    $("#star2"),
    $("#star3"),
    $("#star4")

]
$star[0].click((e)=>{
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star-o')
    for(i=0;i<1;i++)
        $star[i].attr('class','fa fa-star')
    $("#rate").val(1)
})
$star[1].click((e)=>{
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star-o')
    for(i=0;i<2;i++)
        $star[i].attr('class','fa fa-star')
    $("#rate").val(2)
})
$star[2].click((e)=>{
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star-o')
    for(i=0;i<3;i++)
        $star[i].attr('class','fa fa-star')
    $("#rate").val(3)
})
$star[3].click((e)=>{
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star-o')
    for(i=0;i<4;i++)
        $star[i].attr('class','fa fa-star')
    $("#rate").val(4)
})
$star[4].click((e)=>{
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star-o')
    for(i=0;i<5;i++)
        $star[i].attr('class','fa fa-star')
    $("#rate").val(5)
})

// $("#star0").mouseenter((e)=>{
//     // alert(e.target.getAttribute('id'))
//     e.target.setAttribute('class','fa fa-star');
//     for(i=1;i<5;i++)
//         $star[i].attr('class','fa fa-star-o')
// })
// $("#star0").mouseleave((e)=>{
//     // alert(e.target.getAttribute('id'))
//     e.target.setAttribute('class','fa fa-star-o');
//     for(i=1;i<5;i++)
//         $star[i].attr('class','fa fa-star-o')
// })
// $("#star0").click((e)=>{
//     $("#star0").mouseleave((e)=>{
//         e.target.setAttribute('class','fa fa-star');
//     })
// })
// $("#star1").mouseenter((e)=>{
//     // alert(e.target.getAttribute('id'))
//     e.target.setAttribute('class','fa fa-star');
//     for(i=2;i<5;i++) {
//         $star[i].attr('class', 'fa fa-star-o')
//     }
//     for(i=0;i<1;i++){
//         $star[i].attr('class', 'fa fa-star')
//     }
// })
// $("#star1").mouseleave((e)=>{
//     e.target.setAttribute('class','fa fa-star-o');
//     for(i=0;i<5;i++)
//         $star[i].attr('class','fa fa-star-o')
// })
// $("#star1").click((e)=>{
//
//     $("#star1").mouseleave((e)=>{
//         // e.target.setAttribute('class','fa fa-star-o');
//         for(i=0;i<2;i++)
//             $star[i].attr('class','fa fa-star')
//     })
// })
//
// for(var i=0;i<5;i++){
//     $star[i].mouseenter((e)=>{
//         // alert(e.target.getAttribute('id'))
//         e.target.setAttribute('class','fa fa-star');
//
//     })
//     $star[i].mouseleave((e)=>{
//         e.target.setAttribute('class','fa fa-star-o');
//
//     })
//     $star[i].click((e)=>{
//         star[i].mouseleave((e)=>{})
//     })
// }
