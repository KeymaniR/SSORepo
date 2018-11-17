<?php
$json_products = '[
{
    "id": "1",
        "gName": "Shadows of Mordor",
        "price": 20,
        "currency": "$",
        "description": "You like the Lord Of the Rings?",
        "system": "Xbox One",
        "images": "<img class="prodIm img-rounded" src = ../images/som2.jpg>"

    },
{
    "id": "2",
        "gName": "Fallout 4",
        "price": 20,
        "currency": "$",
        "description": "World of Dystopian Massacre",
        "system": "Xbox One",
        "images": "<img class="prodIm img-rounded" src = ../images/fallout4s.jpg>"

    },
{
    "id": "3",
        "gName": "Hitman Absolution",
        "price": 20,
        "currency": "$",
        "description": "Join the Assassin industry",
        "system": "Xbox One",
        "images": "<img class="prodIm img-rounded" src = ../images/hitman2.jpg>"

    },
{
    "id": "4",
        "gName": "Skyrim",
        "price": 20,
        "currency": "$",
        "description": "Massive open world game",
        "system": "Xbox One",
        "images": "<img class="prodIm img-rounded" src = ../images/skyrim2.jpg>"

    },
{
    "id": "5",
        "gName": "BioShock Infinite",
        "price": 20,
        "currency": "$",
        "description": "Alot of Dystopian Fantasy",
        "system": "Xbox One",
        "images": "<img class="prodIm img-rounded" src = ../images/bio2.jpg>"

    }

]';


$games = json_decode($json_products, true);
function displayProducts($games)
{
    //var_dump($games);
    foreach($games as $k=> $v){
       echo '<div class="gInfo col-sm-4 col-md-4" id="">'.
        '<div class="text-center"><span>' .$v["images"]. '</span></div>'.
        '<span>' . $v["gName"]. '</span><br/>' .
        '<span>'.$v["currency"].''. $v["price"]. '</span>'.
        '<br/>'.
        '<span>'.$v["description"].'</span>'.
        '<br/>'.
        '<input id="qty" type="number" max="30" min="1" value="1"/><br>'.
        '<button id="cartBtn" onclick="addProductToShoppingCart('.$v["id"].',$(this).prev().prev().val())'.'">Add to cart</button>'.
           '<div/> <div/>';
    }
}


function updateProduct(){

}

function addProduct(){

}



/*
$products = array(
    0 =>
        array(
            'id'=> 1,
            'game' => 'Shadows Of Mordor',
            'description' => 'You like the Lord Of the Rings?',
            'picture' => '<img class="prodIm img-rounded" src = ../images/som2.jpg>',
            'price'=> '20',
            'currency'=> '$',
        ),
    1=>
        array(
            'id' => 2,
            'game' => 'Fallout 4',
            'description' => 'World of Dystopian Massacre',
            'picture' => '<img class="prodIm img-rounded" src = ../images/fallout4s.jpg>',
            'price'=> '20',
            'currency'=> '$',
        ),
    2 =>
        array(
            'id' => 3,
            'game' => 'Hitman Absolution',
            'description' => 'Join the Assassin industry',
            'picture' => '<img class="prodIm img-rounded" src = ../images/hitman2.jpg>',
            'price'=> '20',
            'currency'=> '$',
        ),
    3=>
        array(
            'id'=> 4,
            'game' => 'Skyrim',
            'description' => 'Massive open world game',
            'picture' => '<img class="prodIm img-rounded" src = ../images/skyrim2.jpg>',
            'price'=> '20',
            'currency'=> '$',
        ),
    4=>
        array(
            'id'=> 5,
            'game' => 'BioShock Infinite',
            'description' => 'Alot of Dystopian Fantasy',
            'picture' => '<img class= "prodIm img-rounded" src = ../images/bio2.jpg>',
            'price'=> '20',
            'currency'=> '$',
        ));

*/

