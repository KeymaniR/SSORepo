<?php
require_once "../scripts/duracell.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=='POST') {
    if (isset($_POST["logout"])) {
        logout();
        header("Location: Login.php");}}

        links();
?>

<title>Cart</title>
    <link rel="stylesheet" type="text/css" href="../styles/form.css">

</head>


<body id="body">

<div id="logoContainer">
    <img src="../images/weblogo.png" id="Hlogo"/>
</div>

<nav class="navbar navbar-inverse" id="top">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="../images/weblogo.png" id="logo"/>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign"></span> Info<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="AboutUs.php">About Us</a></li>
                    <li><a href="ContactUs.php">Contact</a></li>
                </ul>
            </li>
            <li class=""><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
            <li class=""><a href="Admin.php"><span class="glyphicon glyphicon-alert"></span> Admin Only</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="ShoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <?php if(!isAuthenticated()){showRegister();}else{echo '';};?>
            <?php if(!isAuthenticated()){showLogin();}else{echo '';};?>
        </ul>
    </div>
</nav>

<div id="checkout">

</div>
<div id="continue">
    <a href="home.php" id="conShop">Continue Shopping</a>
</div>
<div id="empty">
    <a href="#" id="emptyCart">Empty Cart</a>
</div>
<div id="buy">
    <a href="#" id="buyout">Checkout</a>
</div>
<div class="continue">
    <a href="#top" id="buyout">Back To Top</a>
</div>

<div id="time">

</div>

<?php
if(isAuthenticated()== true) {
    logoutButton();
}
?>

<?php
footer();
?>



</body>
</html>
