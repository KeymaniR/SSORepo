<?php
session_start();
require_once "../scripts/duracell.php";

$pdo = new PDO("mysql:host=127.0.0.1;dbname=kreid", "kreid", "ixS9Vl2mm1");
$result = $pdo -> query("SELECT * FROM gamers order by email asc limit 5");


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['phone']) && isset($_POST['bday']) && isset($_POST['thoughts'])) {
    $isAdmin = ($_POST['isAdmin']=="on")? 1: 0;
    $insert = "INSERT INTO gamers (name, email, pword, phone, bday, thoughts, isAdmin) values(:name, :email, :pword, :phone, :bday, :thoughts, :isAdmin)";
    $stmnt= $pdo->prepare($insert);
    $stmnt->execute(array(":name"=>$_POST['name'] , ":email"=>$_POST['email'],":pword"=>$_POST['pword'],":phone"=>$_POST['phone'], ":bday"=>$_POST['bday'], ":thoughts"=>$_POST['thoughts'], ":isAdmin"=>$isAdmin));
    header('location: Login.php');
}
links();
?>
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <title> Register</title>
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
            <li class="active"><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <form id="contact" action="" method="post">
        <h1> Register Here! </h1>
        <fieldset>
            Name:
            <input type="text" placeholder="Ex: John Doe" name="name" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            Email:
            <input placeholder="john@abcd.com" type="email" name="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            Password: <br/>
            <input placeholder="Password" type="password" name="pword" tabindex="3" required>
        </fieldset>
        <fieldset>
            Number:
            <input placeholder="Number" type="tel" name="phone" tabindex="4" required>
        </fieldset>
        <fieldset>
            Birthday: <br/ >
            <input type="date" name="bday" value="yyyy-MM-dd">
        </fieldset>
        <fieldset>
            Thoughts:
            <input placeholder="What is on your mind as you type this right now?" type="text" name="thoughts" tabindex="5" required>
        </fieldset>
        <fieldset>
            Are you an Admin? <br/ >
            <input type="checkbox" name="isAdmin">
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
footer();
?>

</body>
</html>