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

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invaildEmail($email){
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
    // $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? ;";
    $sql = "SELECT * FROM customer WHERE cUname = ? OR cEmail = ? ;";
    
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

function createUser($conn, $name, $email, $username, $pwd) {
    // $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $sql = "INSERT INTO customer (cName, cEmail, cUname, cPword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../register.php?error=stmtfailed2");
        exit();
    }
    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    // mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
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


/* Hashed Password */
// function LoginUser($conn, $username, $pwd){
//     $uidExists = uidExists($conn, $username, $username);
//     if ($uidExists === false){
//         header("Location:../login.php?error=wronglogin");
//         exit();
//     }
    
//     // $pwd1 = $uidExists["usersPwd"];
//     $pwd1 = $uidExists["cPword"];
//     // $pwdHashed = $uidExists["usersPwd"];
//     $checkPwd = password_verify($pwd, $pwd1);
//     // $checkPwd = password_verify($pwd, $pwdHashed);

//     if ($checkPwd === false){
//         // echo implode("",$uidExists);
//         echo $pwd . ' ' . $pwd1;
//         // header("Location:../login.php?error=wrongpassword");
//         exit();
//     } else if ($checkPwd === true){
//         session_start();
//         // $_SESSION["userid"] = $uidExists["usersId"];
//         // $_SESSION["useruid"] = $uidExists["usersUid"];
//         // $_SESSION["username"] = $uidExists["usersName"];
//         $_SESSION["userid"] = $uidExists["id"];
//         $_SESSION["useruid"] = $uidExists["cUname"];
//         $_SESSION["username"] = $uidExists["cName"];
//         header("Location:../home.php");
//         exit();
//     }

// }

function LoginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("Location:../login.php?error=wronglogin");
        exit();
    }

    $pwd1 = $uidExists["cPword"]; 

    if ($pwd !== $pwd1) {
        header("Location:../login.php?error=wrongpassword"); 
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["cUname"];
        $_SESSION["username"] = $uidExists["cName"];
        header("Location:../home.php");
        exit();
    }
}
