<?php
require_once "../scripts/duracell.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=='POST') {
if (isset($_POST["logout"])) {
logout();
header("Location: Login.php");}}


links();
?>
    <title>About Us</title>
</head>

<body id="body" >

<div id="logoContainer">
    <img src="../images/weblogo.png" id="Hlogo"/>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="118">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="../images/weblogo.png" id="logo"/>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign"></span> Info<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a href="AboutUs.php">About Us</a></li>
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

<div id="aboutUs">
    My name is Keymani Reid and I am currently pursuing a career in the Game Design field. Whether it be
    helping to manufacture the code or even help bring the animations to life and look more realistic, I want
    to contribute in some way to at least one video game in my life.
    <br />I attend Clark Atlanta University as a sophomore<br />
    as a Computer Science major.
</div>



<div id="time">

</div>

<?php
if(isAuthenticated()== true) {
    logoutButton();
}
footer();
?>
</body>
</html>