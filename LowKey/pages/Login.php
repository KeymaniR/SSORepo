<?php
require_once "../scripts/duracell.php";
session_start();

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        if(isset($_POST["login"])){
            $ret = authenticate($_POST["name"],$_POST["pword"] );
            if($ret){
                header('Location: home.php');
            }else{
                $_SESSION["error"] = "Invalid user name or password";
                echo '<script> ';
                echo 'alert("Incorrect username/password");';
                echo '</script>';}}

        if(isset($_POST["registerPage"])) {
            header('Location: Registration.php');
        }
}
links();
?>
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <title>Login</title>
</head>
<body id="body">

<div id="logoContainer">
    <img src="../images/weblogo.png" id="Hlogo"/>
</div>

<div class="container">
    <form id="contact" action="" method="post">
        <h1> Log in </h1>
        <fieldset>
            <input placeholder="User Name" type="text" id="uname" name="name" tabindex="1">
        </fieldset>
        <fieldset>
            <input placeholder="Password" type="password" id="pword" name="pword" tabindex="2">
        </fieldset>
        <fieldset>
            <button name="login" type="submit" id="login">Log in</button>
        </fieldset>
        <fieldset>
            <button name="reset" type="reset" id="reset">Reset</button>
        </fieldset>
        <fieldset>
            <button name="registerPage" type="submit" id="reset">Register</button>
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