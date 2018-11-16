$.cookie.json=true;
/*var prods = [
    {
        "id": "1",
        "gName": "Shadows of Mordor",
        "price": 20,
        "currency": "$",
        "description": "You like the Lord Of the Rings?",
        "system": "Xbox One",
        "images": "<img class='prodIm img-rounded' src = ../images/som2.jpg>"

    },
    {
        "id": "2",
        "gName": "Fallout 4",
        "price": 20,
        "currency": "$",
        "description": "World of Dystopian Massacre",
        "system": "Xbox One",
        "images": "<img class='prodIm img-rounded' src = ../images/fallout4s.jpg>"

    },
    {
        "id": "3",
        "gName": "Hitman Absolution",
        "price": 20,
        "currency": "$",
        "description": "Join the Assassin industry",
        "system": "Xbox One",
        "images": "<img class='prodIm img-rounded' src = ../images/hitman2.jpg>"

    },
    {
        "id": "4",
        "gName": "Skyrim",
        "price": 20,
        "currency": "$",
        "description": "Massive open world game",
        "system": "Xbox One",
        "images": "<img class='prodIm img-rounded' src = ../images/skyrim2.jpg>"

    },
    {
        "id": "5",
        "gName": "BioShock Infinite",
        "price": 20,
        "currency": "$",
        "description": "Alot of Dystopian Fantasy",
        "system": "Xbox One",
        "images": "<img class='prodIm img-rounded' src = ../images/bio2.jpg>"

    }

]*/

var users = [
    {
        "uid": 100,
        "gid": 100,
        "first": "Key",
        "last": "Reid",
        "email": "inamyek@hotmail.com",
        "pword": "closed"
    },
    {
        "uid": 101,
        "gid": 100,
        "first": "Reid",
        "last": "Smith",
        "email": "r.smith@aol.com",
        "pword": "proceed"
    },
    {
        "uid": 101,
        "gid": 200,
        "first": "Adam",
        "last": "Richard",
        "email": "a.rich@aol.com",
        "pword": "concurrence"
    },
    {
        "uid": 101,
        "gid": 200,
        "first": "Jeremy",
        "last": "Conyers",
        "email": "j.conyers@aol.com",
        "pword": "occurence"
    }
]
//Display Products
/*
function displayProducts(){

    $.each(prods,function (k,v) {
        var prod = '<div class="gInfo col-sm-4 col-md-4" id="">' +
            '<div class="text-center"><span>' +v.images+ '</span></div>'+
            '<span>' + v.gName + '</span><br/>' +
            '<span>'+v.currency+''+ v.price + '</span>'+
            '<br/>'+
            '<span>'+v.description+'</span>'+
            '<br/>'+
            '<input id="qty" type="number" max="30" min="1" value="1"/><br>'+
            '<button id="cartBtn" onclick="addProductToShoppingCart('+v.id+',$(this).prev().prev().val())'+'">Add to cart</button>'+
            '<div/> <div/>';

        $("#list").append(prod);

    });
}

$(document).ready(function(){
    displayProducts();
});*/

//Start of Shopping Cart Functions
function addProductToShoppingCart(gid,count) {

    var sProduct;
    $.each(prods,function (k, v) {
        if (v.id == gid) {
            sProduct = v;
            return;
        }
    });
    //Check if the product selected is eligible
    if (!sProduct || isNaN(count) || !parseInt(count)) {
        return;
    }
    //Check if there is a product there already
    var game = {"gid": sProduct.id, "price": sProduct.price, "count": count};
    var isDuplicate = lookupInCookieById(gid);

    if ($.cookie("selectedItems")) {
        var items = $.cookie("selectedItems");
        if (isDuplicate) {
            lookupUpdateQtyInCookieById(gid, count);
        } else {
            items.push(game);            //adds the same product
            $.cookie("selectedItems", items);
        }
    } else {
        $.cookie("selectedItems", [game]);   //adds the two different products
    }
}

function lookupInCookieById(id){
    var items = $.cookie("selectedItems");
    var found = false;
    if(!items){
        return false;
    }
    $.each(items,function (k,v){
        if(v.gid==id){
            found=true;
            return;
        }
    });
    return found;
}

function lookupUpdateQtyInCookieById(id,count){
    var items = $.cookie("selectedItems");
    var found =0;
    $.each(items,function (k,v){
        if(v.gid==id){
            v.count = parseInt(count)+ parseInt(v.count);
            return;
        }
    });
    $.cookie("selectedItems",items);
    return;
}

function displayCart(){

    var cartItems = $.cookie("selectedItems");
    var cartDisplay = '<div class="container-fluid"><div class="row"><div class="col-md-2"></div><div class="col-md-8"><table id="shoppingCart"><caption id="align">Shopping Cart</caption><thead><tr><th></th><th id="align">Item Analysis</th><th>Count</th><th>Price</th><th>Total Price</th></tr></thead><tbody>';
    var total =0;

    if(!cartItems || !cartItems.length) {
        $("#checkout").html('...But there is nothing here my guy!<br/><hr/>');   // Message you want to print when the shopping cart is empty
        return;
    }

    $.each(cartItems,function (k,v) {

        var gid = v.gid;
        var count = v.count;
        var sp;
        $.each(prods,function (prk,prv) {
            if(gid==prv.id){
                sp= prv;
                return;
            }
        });
        var price = parseFloat(sp.price);
        cartDisplay += '<tr><td><img src="'+sp.images+'" class="prodIm img-rounded"></td><td>' + sp.gName + ' - ' + sp.description + '</td><td>' + count + '</td>' +
            '<td>$' + price + '</td><td>$' + price* parseInt(count)+'</td>'+
            '</tr>';
        total += price* parseInt(count);

    });
    cartDisplay += '</tbody><tfoot><tr><th colspan="3" id="align">Subtotal</th><th></th><th>$' + parseFloat(total,2) + '</th></tr></tfoot></table></div><div class="col-md-2"></div></div></div>';
    $("#checkout").html(cartDisplay);
}

function displayCartItemCount(){
    var items = $.cookie("selectedItems");
    if(items ) {
        $('#cartCount').text(items.length);
    }else{
        $('#cartCount').text(0);
    }
}
$(document).ready(function () {

    displayCart();
    $('#empty').click(function () {
        $.removeCookie("selectedItems");
        displayCart();
        return;
    });
    displayCartItemCount();
});


//Showing the time on my screen
function showTime() {


    var d1 = new Date();
    var hours1 = d1.getHours();
    var min = d1.getMinutes();
    var sec =  d1.getSeconds();
    hours = ((hours1 + 11) % 12 + 1);
    if(hours1 <= 11 && min <=59 ) {
        document.getElementById("time").innerHTML =  hours +":"+min+" am";
        document.getElementById("body").style.backgroundColor = "white";
    }
        else{
        document.getElementById("time").innerHTML = hours+ ":"+min+" pm";
        document.getElementById("body").style.backgroundColor = "black";

    }

}
setInterval(showTime, 1000);


function playVideo(){

}




//Slideshow is here



var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    //if(x || x.length==0 )
      //  return;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
}
/*Trying to display number of cart items in cart
cTotal = count+=count;
document.getElementById("cart").innerHTML = "Cart("+cTotal+")";*/

$(document).ready(function (){
    carousel();
});




/*
//My menu bar is here
function openNav() {
    document.getElementById("mySidenav").style.width = "130px";
}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

*/



