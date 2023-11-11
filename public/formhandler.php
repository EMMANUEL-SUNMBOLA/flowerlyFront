<?php
session_start();
$err = [];

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["signUpBut"]))){
     require("../private/functions.php");


    $name = strip_tags($_POST["name"]);
    $phone = strip_tags($_POST["phone"]);
    $email = strip_tags($_POST["email"]);
    $pass = strip_tags($_POST["pass"]);

    //Reg as in Regex to check for patterns    $nameReg = "/[a-zA-Z]/";
    $phoneReg = '/[0-9+]/';
    $emailReg = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $passReg = '/[a-zA-Z0-9]/';

    if((!preg_match($nameReg, $name)) || (!FindUser('name', $name))){
        $err[] = "Invalid Name";
    }

    if(!preg_match($phoneReg, $phone) || (!FindUser('phone', $phone)) || (strlen($phone) !== 11)){
        $err[] = "Invalid Phone";    
    }  
    
    if(!preg_match($passReg, $pass) || (!FindUser('pass', $pass)) || (strlen($pass) < 6)){
        $err[] = "Invalid Password";    
    }

    if(!preg_match($emailReg, $email) || (!FindUser('email', $email)) || (strlen($email) > 256)){
        $err[] = "Invalid Email";    
    }

    if(empty($err)){
        $_SESSION["name"] = $name;
        $_SESSION["status"] = createUser($name, $email, $phone, $pass);
        if($_SESSION["status"]){
            header("Location:customer.php");
        }else{

        }
    }else{
        $err[] = "User Creation Failed";
        $_SESSION["errors"] = $err;
        header("Location:signup.php");
    }
 }
elseif(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["logInBut"]))){
    $email = strip_tags($_POST["email"]);
    $pass = strip_tags($_POST["pass"]);

}

    $_SESSION["errors"] = $err;
    header("Location:signup.php");
