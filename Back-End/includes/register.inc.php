<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignup($name,$email,$pwd,$pwdRepeat);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExists = uidExists($conn, $name, $email); 

    if($emptyInput !== false){
        header("Location:../register.php?error=emptyinput");
        exit();
    }
    if($invalidEmail !== false){
        header("Location:../register.php?error=invalidemail");
        exit();
    }
    if($pwdMatch !== false){
        header("Location:../register.php?error=passwordsdontmatch");
        exit();
    }
    if($uidExists !== false){
        header("Location:../register.php?error=nametaken");
        exit();
    }

    createUser($conn, $name, $email, $pwd);


}
else {
    header('Location:../login.php');
}