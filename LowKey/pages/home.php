<?php
require_once "../scripts/duracell.php";
session_start();

if(isAuthenticated()== true)
{

    echo '<div id="greeting">Welcome to LowKey Gaming '.$_SESSION['name'].'</div>';
    echo '<div id="time"> </div>';

}else{
    echo '<div id="greeting">Welcome User. Register for an Account or Sign in to add items to cart!</div>';
    echo '<div id="time"></div>';
}
;

if($_SERVER["REQUEST_METHOD"]=='POST') {
    if (isset($_POST["logout"])) {
        logout();
        header("Location: Login.php");

    } elseif
        (isset($_POST["addProduct"])) {
        insertProducts($_POST);
    header("Location: home.php");
    }
    elseif (isset($_POST["updateProduct"])) {
        updateProduct($_POST);
        header("Location:home.php");
    }
    elseif (isset($_POST["delete"])) {
        deleteProduct($_POST['pid']);
        header("Location:home.php");
    }
}
links();
?>
    <title>LowKey Gaming</title>
</head>
<body id="body" onload="carousel()">

<div id="logoContainer">
    <img src="../images/weblogo.png" id="Hlogo"/>
</div>
<form method="post">
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="160">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="../images/weblogo.png" id="logo"/>
        </div>

        <ul class="nav navbar-nav">
            <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
            <li><a href="ShoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <?php if(!isAuthenticated()){showRegister();}else{echo '';};?>
            <?php if(!isAuthenticated()){showLogin();}else{echo '';};?>
        </ul>
    </div>
</nav>
</form>


<div class="homeContainer">
<div id="leftBlock">

</div>

<div class="slides" style="max-width:900px;">
    <img class="mySlides" src="../images/shadows.jpg" style="width:100%">
    <img class="mySlides" src="../images/fallout4.jpg" style="width:100%">
    <img class="mySlides" src="../images/hitman.jpg" style="width:100%">
    <img class="mySlides" src="../images/skyrim.jpg" style="width:100%">
    <img class="mySlides" src="../images/bio.jpg" style="width:100%">
</div>

    <div id="rightBlock">

    </div>

</div>

<div id="quote">
    "Home of the less unfortunate"
</div>

<?php
loadGames();
if(isset($_SESSION["games"])){
    displayProducts($_SESSION["games"]);
}

?>


<?php
if(isAdmin()) {
    echo '<div class=""><div class="col-md-12"><div class="" style="margin-left: 15px">';
    if(isset($_POST["edit"])) {
        $pid = $_POST["pid"];
        $games = getProductById($_POST["pid"]);
        if(isset($games)) {
            displayProductUpdate($games);
        }
    }else{
        displayProductInsert();
    }
    echo '</div> </div></div>';
}
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


<br/><br/><br/><br/><br/><br/><br/>



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

