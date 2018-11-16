<?php
require_once "../scripts/duracell.php";
session_start();

if(!isAuthenticated()){

    echo '<script>';
    echo  'alert("Please make a Profile");';
    echo   'window.location.href="Registration.php";</script>';
}
if($_SERVER["REQUEST_METHOD"]=='POST') {
if (isset($_POST["logout"])) {
    logout();
    header("Location: Login.php");
}elseif
    (isset($_POST["updateProfile"])) {
    updateProfile($_POST);
    header("Location: Profile.php");

}}
links();
?>


<title> Profile </title>
<body id="body">




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
                <li class=""><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign"></span> Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="AboutUs.php">About Us</a></li>
                        <li><a href="ContactUs.php">Contact</a></li>

                    </ul>
                </li>
                <li class="active"><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
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



<div class="row">
    <div class=" col-sm-4 col-md-4">

    </div>
    <div class="col-sm-4 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3> <?php showNameProfile()?></h3>
                <p id="userInfo">Email: <?php echo showEmail()?></p>
                <p id="userInfo">Registered Thoughts: <?php echo showThoughts()?>
                <p id="userInfo">Birthday: <?php echo showBday()?></p>
                <p id="userInfo">Phone Number: <?php echo showNumber()?></p>
                <p id="userInfo">Admin: <?php echo showAdmin()?></p>
                <form method="post"> <p><button type="submit" class="btn btn-primary" name="editProf">Edit Profile</button></p>
                    <?php echo '<input type="hidden" name="prid" value="'.$_SESSION['uid'].'">'?> </form>
            </div>
        </div>
    </div>
</div>

<?php
loadProf();
if(isset($_SESSION["profile"])){
   // displayProfiles($_SESSION["profile"]);
}
echo '<div class=""><div class="col-md-12"><div class="" style="margin-left: 15px">';
    if(isset($_POST["editProf"])) {
        $prid = $_SESSION['uid'];
    $profile = getProfileById($_POST["prid"]);
        if(isset($profile)) {
            showProfileEdit($profile);

}echo '</div></div></div>';
    }
?>

<div id="time"></div>
<?php
if(isAuthenticated()== true) {
    logoutButton();
}

footer();
?>
</body>
</html>
