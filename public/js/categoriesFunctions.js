

let superCategory = true,idCategory;

let links = document.getElementsByClassName('subCat');

for(let i=0;i<links.length;i++){
    links[i].addEventListener('click',function (ev) {
        ev.preventDefault();
        var str = (ev.target.getAttribute('id'))+"";
        var index = str.search('-');
        let id =str.substr(index+1,str.length-1-index);
        callAPIForSubCategory(id);
    })
}
function callAPIForSubCategory( id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById('mainDiv').innerText = (this.responseText);
            let json = JSON.parse(this.response);

            BuildHTMLContent(json);
        }
    };
    xhttp.open("GET", "/category/"+id, true);
    xhttp.send();
}
var pro;
function callAPIForProductBelongsToSpecificCategory( id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById('mainDiv').innerText = (this.responseText);
            let json = (this.response+'');
            json = JSON.parse(json).data;
            //console.log(json);
            console.log(json);
        }
    };
    xhttp.open("GET", "/category/"+id+"/products", true);
    xhttp.send();
}
function BuildHTMLContent(json) {
    let root = document.getElementById('mainDiv');
    //let products = callAPIForProductBelongsToSpecificCategory(json.id);
    //console.log(pro)
    root.innerHTML = ' <div style="text-align: center; font-size: xx-large;margin-top: 50px">'+ json.name+' SubCategory</div>'+
        '<p style="display: none" id="categoryID">'+json.id+'</p>'
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById('mainDiv').innerText = (this.responseText);
            superCategory = false;
            idCategory = json.id;
            let products = (this.response+'');
            //alert(products.valid);
            products = JSON.parse(products);
            let valid = (products.valid);
            let userID = products.userID;

            products = products.data;
            //root.innerHTML+=products[0].name;
            //console.log(products[0].name)


            let str = "";
            let strStart = ''+

                            '<!-- Products -->'+

                            '<div class="products_iso">'+
                             '   <div class="row">'+
                                    '<div class="col">'+
                                        '<div class="product-grid">';



                                        let strEnd = '<!-- Product Grid -->'+

                                        ''+

                                            '<!-- Product 1 -->'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                ''
            for(let i=0;i<products.length;i++){
                str+='<div class="product-item men" style="display: inline-block">'+
                        '<div class="product discount product_filter">'+
                            '<div class="product_image">'+
                                '<img src="/storage/product_images/'+products[i].img+'" alt="" style="width: 90%;margin: 5%;height: 198px;">'+

                        '</div>'+
                    '<div class="favorite favorite_left"></div>'+
                    (products[i].discounted_price !=0?'<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">\n' +
                        '                                                                <span>-$'+(products[i].price - products[i].discounted_price ).toFixed(3)+'</span>\n' +
                        '                                                            </div>':"")+
                    ''+//for descount price
                    '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center">\n' +
                    '<span>new</span></div>'+
                    '                                                        <div class="product_info">\n' +
                    '\n' +
                    '\n' +
                    ''+
                    '\n' +
                    '<h5 class="product_name"><a href="/products/'+products[i].id+'">'+products[i].name+'</a></h5>\n' +
                    '<div class="product_price">\n$' +
                    ((products[i].discounted_price ==0) ? (products[i].price):products[i].discounted_price +"<span>$"+products[i].price+"</span>" )+
                    '\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>'+
                    '</div>'+
                    '<div class="red_button add_to_cart_button"><a class="addToChart" href="'+(valid==true ? "/products/"+products[i].id+"/addToChart/"+userID:'asd1')  +'">add to cart</a></div>'+
                    '</div>';
            }
            root.innerHTML+= strStart + str + strEnd;
            /**/

            var chartList = document.getElementsByClassName('addToChart');
            for (let i=0;i<chartList.length;i++){
                chartList[i].addEventListener('click',function (ev) {
                    ev.preventDefault();
                    let userID,productID;
                    let x = chartList[i].getAttribute('id')+""; //user:9,product:59
                    let index = x.indexOf(',');
                    userID = x.substr(5,index-5);
                    productID = x.substr(index+9,x.length-index-9);
                    // alert(productID +" "+ userID);
                    // console.log(ev.target.getAttribute('href'));
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            let json = JSON.parse( this.responseText);
                            console.log(json[1]);
                            console.log(this.responseText);
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
                    };
                    xhttp.open("GET",ev.target.getAttribute('href') , true);
                    xhttp.send();
                });
            }
        }
    };
    xhttp.open("GET", "/category/"+json.id+"/products", true);
    xhttp.send();

}

/*
create the filter for price
 */



var amount = document.getElementById('amount');
var filter = document.getElementById('filter');

filter.onclick = function (ev) {
    let min,max;
    min = amount.value + "";
    let index = min.indexOf('-');
    min = parseInt(min.substr(1,index - 2));
    max = amount.value + "";
    max = parseInt(max.substr(index+3,max.length-index));
    //alert(superCategory);
    /**
     * call an API For filteration in price
     */
    if(!superCategory){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let json = JSON.parse( this.responseText);
                console.log(json);
            }
        };
        xhttp.open("GET", "/category/search/price/"+document.getElementById('categoryID').textContent+"/"+max, true);
        xhttp.send();
    }
    else{
        filter.setAttribute('disable','disable');
    }
    /**
     *
     */

}


var chartList = document.getElementsByClassName('addToChart');
for (let i=0;i<chartList.length;i++){
    chartList[i].addEventListener('click',function (ev) {
        ev.preventDefault();
        let userID,productID;
        let x = chartList[i].getAttribute('id')+""; //user:9,product:59
        let index = x.indexOf(',');
        userID = x.substr(5,index-5);
        productID = x.substr(index+9,x.length-index-9);
        //alert(productID);
        callAPIAddToChart(userID,productID)
    });
}
function callAPIAddToChart(userID,productID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let json = JSON.parse( this.responseText);
            console.log(json[1]);
            console.log(this.responseText);
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
    };
    xhttp.open("GET", '/products/'+productID+'/addToChart/'+userID, true);
    xhttp.send();
}

/**
 * do an
 */






