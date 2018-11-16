<?php
function displayProducts($games)
{
    foreach($games as $k=> $v){
        echo '<div class="gInfo col-sm-4 col-md-4 text-center" id="describe">'.
            '<img class="prodIm img-rounded" src="' .$v["images"]. '"/><br/>'.
            '<span>' . $v["gName"]. '</span><br/>' .
            '<span>'.$v["currency"].''. $v["price"]. '</span>'.
            '<br/>'.
            '<span>'.$v["description"].'</span>'.
            '<br/>'.
            '<input id="qty" type="number" max="30" min="1" value="1"/><br/>'.
            '<button id="cartBtn" name="add" onclick="addProductToShoppingCart('.$v["id"].',$(this).prev().prev().val())'.'">Add to cart</button>'.
            '<form method="post" class="form-inline\">'.
            '<input type="hidden" name="pid" value="'.$v['id'].'">'.
            ((isAdmin())? '<button type="submit" name="edit" value="update" id="adminBtn">Edit</button>
            <button type="submit" name="delete" value="del" id="del">Delete</button>': "").
            '</form> </div>';
    }
}

function displayProfiles($profile)
{
        echo '<div class="row">'.
           '<div class=" col-md-4">'.
           '</div>'.
   '<div class="col-sm-6 col-md-4">'.
        '<div class="thumbnail">'.
            '<div class="caption">'.
                '<h3>'.showNameProfile().'</h3>'.
                '<p id="userInfo">Email:' .showEmail(). '</p>'.
                '<p id="userInfo">Registered Thought:' .showThoughts().'</p>'.
                '<p id="userInfo">Birthday:'. showBday(). '</p>'.
                '<p id="userInfo">Phone Number:' .showNumber(). '</p>'.
                '<p id="userInfo">Admin:' .showAdmin(). '</p>'.
                '<form method="post"> <p><button type="submit" class="btn btn-primary" name="editProf">Edit Profile</button></p>'.
                '<input type="hidden" name="prid" value="'.$_SESSION['uid'].'"> </form>'.
           '</div>'.
        '</div>'.
    '</div>'.
            '</div>';
    }



function authenticate($username, $password)
{
    $pdo = getPDOConnection();
    $sql = "SELECT * FROM gamers WHERE  `name` ='" . htmlentities($username) . "' AND `pword` ='" . htmlentities($password) . "'";


    $result = $pdo->query($sql);
    //$stmnt->execute(array(":username"=>$username, ":password"=>$password));
    if (isset($result) && count($result) > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['uid'] = $row["id"];
            $_SESSION['ausr'] = true;
            $_SESSION['isAdmin'] = $row["isAdmin"];
            $_SESSION['name']= $row["name"];
            $_SESSION['pword'] = $row["pword"];
            $_SESSION['email']= $row["email"];
            $_SESSION['bday']= $row["bday"];
            $_SESSION['phone']= $row["phone"];
            $_SESSION['thoughts']= $row["thoughts"];
            return true;
        }
    } else {
        logout();
        return false;
    }
}
function isAuthenticated()
{
//check the session for session['ausr'] & ['uid']
    if (isset($_SESSION['ausr']) && $_SESSION['ausr']) {
        return true;
    } else {
        logout();
        return false;
    }
}
function logoutButton()
{
    echo '<div id="outBtn"><form method = "post" >'.
'<button name="logout" type="submit" id="logoutBtn"> Logout</button >'.
'</form ></div>';
    }

function logout(){
    session_destroy();
    setcookie("selectedItems", "", time() - 3600);

}


function isAdmin()
{

    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
        return true;
    } else {
        return false;
    }
}

function getPDOConnection()
{
    return new PDO("mysql:host=127.0.0.1;dbname=kreid", "kreid", "ixS9Vl2mm1");
}

function loadGames(){
    $pdo = getPDOConnection();
    $sql = 'SELECT * FROM `kreid`.`Vgames`';
    $result = $pdo->query($sql);
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["games"]=(isset($row) && count($row)>0)? $row :"";
}

function displayProductInsert(){
    echo '<div class="col-sm-3">
                <div class="col-sm-3 ">
                Add New Products:
                <form method="post">
        <input type="text" name="gName" required placeholder="Game Title"/> <br/>
        <input type="text" name="price" required placeholder="Game Price"/><br/>
        <select name="currency" required>
            <option value="$">$</option>
            <option value="¥">¥</option>
        </select>
        <textarea name="description" required placeholder="Synapse on the game"> </textarea><br/>
        <input type="text" name="system" required placeholder="System"/><br/>
        <input type="text" name="images" required placeholder="Image URL"/><br/>
        <input type="submit" name="addProduct" value="Add" id="adminBtn"/>
    </form></div></div>';
}


function insertProducts($games){

    $sql = 'INSERT INTO `kreid`.`Vgames`(`gName`,`price`,`currency`,`description`,`system`,`images`)'.
        ' VALUES (:gName,:price,:currency,:description,:system,:images)';
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);
    $ret = $stmt->execute(array(':gName'=>htmlentities($games["gName"]),':price'=>htmlentities($games["price"]),
        ':currency'=>htmlentities($games["currency"]),':description'=>htmlentities($games["description"]),
        ':system'=>htmlentities($games["system"]),':images'=>htmlentities($games["images"])));

    if(!$ret){
        print_r($pdo->errorInfo());
    }
    return $ret;
}

function getProductById($pid){
    if(isset($_SESSION["games"])){
        foreach ($_SESSION["games"] as $k=> $v){
            if($pid==$v['id']){
                return $v;
            }
        }
    }

}
function showLogin(){
    echo '<li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
}

function showRegister(){
    echo '<li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>';

}

function displayProductUpdate($games){

    echo '<div class="col-sm-3">
                <div class="col-md-3 ">
                Edit Product:
                <form method="post">
        <input type="text" name="gName" required placeholder="Game Name" value="'.$games["gName"].'"/> <br/>
        <input type="text" name="price" required placeholder="Price" value="'.$games["price"].'"/><br/>
        <select name="currency" required>
            <option value="$">$</option>
            <option value="¥">¥</option>
        </select>
        <textarea name="description" required placeholder="Description">'.$games["description"].'</textarea><br/>
        <input type="text" name="system" required placeholder="System" value="'.$games["system"].'"/><br/>
        <input type="text" name="images" required placeholder="Game Image" value="'.$games["images"].'"/><br/>
        <input type="hidden" name="id" value="'.$games["id"].'"/>
        <input type="submit" name="updateProduct" value="Confirm" id="adminBtn"/>
    </form></div></div>';
}

function updateProduct($games){
    $sql = 'UPDATE `kreid`.`Vgames` 
            SET   `gName`=:gName,
                  `price`=:price,
                  `currency`=:currency,
                  `description`=:description,
                  `system`=:system,
                  `images`=:images'.
        ' where `id`='.$games['id'];
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);

    $params = array(':gName'=>htmlentities($games["gName"]),
        ':price'=>htmlentities($games["price"]),
        ':currency'=> htmlentities($games["currency"]),
        ':description'=>htmlentities($games["description"]),
        ':system'=>htmlentities($games["system"]),
        ':images'=>htmlentities($games["images"]));
    $ret = $stmt->execute($params);

    return $ret;
}

function deleteProduct($pid){
    $sql = 'DELETE FROM `Vgames` where `id`= :pid';
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);
    $params = array(':pid'=>$pid);
    $ret = $stmt->execute($params);
    return $ret;
}

function links(){
   $links=' <!DOCTYPE html>'.
   '<html lang="en" xmlns="http://www.w3.org/1999/html">'.
    '<head>'.
    '<meta charset="UTF-8">'.
    '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.
    '<meta name="viewport" content="width=device-width, initial-scale=1">'.
    '<!-- Bootstrap -->'.
    '<link href="../css/bootstrap.css" rel="stylesheet">'.
    '<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->'.
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>'.
    '<!-- Include all compiled plugins (below), or include individual files as needed -->'.
    '<script src="../js/bootstrap.js"></script>'.
    '<script src="../scripts/jquery-3.1.1.min.js"></script>'.
    '<script src="../scripts/jquery.cookie.js"></script>'.
    '<script src="../scripts/authenticate.js"></script>'.
    '<script src="../scripts/initiate.js"></script>'.
    '<link rel="stylesheet" type="text/css" href="../styles/main.css">'.
'</head>';

   echo $links;
}

function showNameProfile(){
echo $_SESSION['name'].'\'s Profile';
}

function showEmail(){
    echo $_SESSION['email'];
}

function showThoughts(){
    echo $_SESSION['thoughts'];
}

function showBday(){
    echo $_SESSION['bday'];
}
function showNumber(){
    echo $_SESSION['phone'];
}

function showAdmin(){
    $no = 'Not an Admin';
    $yes = 'You are an Admin';
    if ($_SESSION['isAdmin']== 0){
        return $no;
    }else{
        return $yes;
    };
}
function loadProf(){
    $pdo = getPDOConnection();
    $sql = 'SELECT * FROM `kreid`.`gamers`';
    $result = $pdo->query($sql);
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["profile"]=(isset($row) && count($row)>0)? $row :"";
}
function footer(){
    if(isset($_SESSION["games"])){
        echo "<script> var prods =". json_encode($_SESSION["games"],true)."</script>";
    }
}



function getProfileById($prid){
    if(isset($_SESSION["profile"])){
        foreach ($_SESSION["profile"] as $k=> $v){
            if($prid==$v['id']){
                return $v;
            }
        }
    }
}

function showProfileEdit($profile){
    echo '<div class="col-sm-3">
                <div class="col-md-3 ">
                Edit Account:
                <form method="post">
        <input type="text" name="email" required placeholder="Email" value="'.$profile["email"].'"/> <br/>
        <input type="text" name="thoughts" required placeholder="Thoughts" value="'.$profile["thoughts"].'"/><br/>
        <input type="date" name="bday" required placeholder="Birthday" value="'.$profile["bday"].'"/><br/>
        <input type="text" name="pword" required placeholder="Password" value="'.$profile["pword"].'"/><br/>
        <input type="tel" name="phone" required placeholder="Number" value="'.$profile["phone"].'"/><br/>
        <input type="hidden" name="id" value="'.$profile["id"].'"/>
        <input type="submit" name="updateProfile" value="Confirm" id="adminBtn"/>
    </form></div></div>';
}

function updateProfile($profile){
    $sql = 'UPDATE `kreid`.`gamers` 
            SET   `email`=:email,
                  `thoughts`=:thoughts,
                  `bday`=:bday,
                  `pword`=:pword,
                  `phone`=:phone,'.
        ' where `gamers`.`id`='.$_SESSION['uid'];
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);
    $params = array(':email'=>htmlentities($profile["email"]),
        ':thoughts'=>htmlentities($profile["thoughts"]),
        ':bday'=>htmlentities($profile["bday"]),
        ':pword'=>htmlentities($profile["pword"]),
        ':phone'=>htmlentities($profile["phone"]));
    $ret = $stmt->execute($params);

    return $ret;
}








