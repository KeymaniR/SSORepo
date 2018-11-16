<?php
require_once "../scripts/duracell.php";
session_start();


if(!isAdmin()){

   echo '<script>';
   echo  'alert("Unauthorized Access");';
   echo   'window.location.href="home.php";</script>';
}
if($_SERVER["REQUEST_METHOD"]=='POST') {
    if (isset($_POST["logout"])) {
        logout();
        header("Location: Login.php");}}


links();
?>


<title>Admin Only</title>

</head>

<body id="body">

<div id="logoContainer">
    <img src="../images/weblogo.png" id="Hlogo"/>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="25">
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
            <li class="active"><a href="Admin.php"><span class="glyphicon glyphicon-alert"></span> Admin Only</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="ShoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <?php if(!isAuthenticated()){showRegister();}else{echo '';};?>
            <?php if(!isAuthenticated()){showLogin();}else{echo '';};?>
        </ul>
    </div>
</nav>
<a href="#">Delete Accounts </a> <br/>
<a href="#">Check Sale Prices</a>

<div id="time">

</div>

<?php
if(isAuthenticated()== true) {
    logoutButton();
}
footer();
?>


</body>