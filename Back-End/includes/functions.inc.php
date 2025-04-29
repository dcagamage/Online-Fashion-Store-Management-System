<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) ||empty($pwdRepeat)){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd != $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM customer WHERE Name = ? OR Email = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../register.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);

}

function adminExists($conn, $username, $email) {
    $sql = "SELECT * FROM admin WHERE Name = ? OR Email = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../login.php?error=stmtfailed2");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO customer (Name, Email, Password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../register.php?error=stmtfailed2");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

function emptyInputLogin($username,$pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function LoginUser($conn, $username, $pwd) {
    
    $adminExists = adminExists($conn, $username, $username);
    if ($adminExists !== false) {
        $pwd1 = $adminExists["Password"]; 

        if ($pwd !== $pwd1) {
            header("Location:../login.php?error=wrongpassword"); 
            exit();
        } else {
            session_start();
            $_SESSION["adminid"] = $adminExists["Id"];
            $_SESSION["adminname"] = $adminExists["Name"];
            $_SESSION["adminemail"] = $adminExists["Email"];
            header("Location:../dashboard-Admin.php");
            exit();
        }
    }

    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("Location:../login.php?error=wronglogin");
        exit();
    }

    $pwd1 = $uidExists["Password"]; 

    if ($pwd !== $pwd1) {
        // echo $pwd." ".$pwd1;
        header("Location:../login.php?error=wrongpassword"); 
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["Id"];
        $_SESSION["username"] = $uidExists["Name"];
        $_SESSION["useremail"] = $uidExists["Email"];
        header("Location:../home.php");
        exit();
    }
}
