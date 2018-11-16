<?php
require_once "../scripts/duracell.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=='POST') {
    if (isset($_POST["logout"])) {
        logout();
        header("Location: Login.php");}}
links();
?>


    <link rel="stylesheet" type="text/css" href="../styles/form.css">
<title>Contact Us!</title>
</head>

<body id="body">

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
                    <li><a href="AboutUs.php">About Us</a></li>
                    <li class="active"><a href="ContactUs.php">Contact</a></li>

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

<div class="container">
    <form id="contact" action="" method="post">
        <h1> Hit Us Up Real Quick! </h1>
        <h2>Contact us at 1-800-LOV-EKEY</h2>
        <fieldset>
            <input placeholder="Your name" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            <input placeholder="Your Email Address" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
        </fieldset>
        <fieldset>
            <input placeholder="What is on your mind as you type this right now?" type="text" tabindex="4" required>
        </fieldset>
        <fieldset>
            <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>
        <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a>. But edited by Keymani Reid</p>
    </form>
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