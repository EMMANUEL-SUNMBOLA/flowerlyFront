<?php

function hashPass($pass){
    $newPass = password_hash($pass, PASSWORD_DEFAULT);
    return $newPass;
}

function createUser($name, $email, $phone, $pass){
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare("INSERT INTO users (name, phone, email, pass) VALUES (:name, :phone, :email, :pass)");
    $stmt -> bindParam(':name', $name);
    $stmt -> bindParam(':phone', $phone);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':pass', $pass);
    return $stmt -> execute();
}

function FindUser($param, $string){
    //this functi0n id f0r the c0mm0n users to validate if a user is already in the database
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare("SELECT * FROM users WHERE $param = :string");
    $stmt -> bindParam(':string', $string, PDO::PARAM_STR);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result[$param] ? true : false;
    
}

function getUser($param, $string){
    //this functi0n id f0r the c0mm0n users to validate if a user is already in the database
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare("SELECT * FROM users WHERE $param = :string");
    $stmt -> bindParam(':string', $string, PDO::PARAM_STR);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
    
}

function updateUser($newName, $newEmail, $newPhone, $newPass, $param, $string){
    try{   
        $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn -> prepare("UPDATE users SET name = :newName, phone = :newPhone,email = :newEmail, pass = :newPass WHERE $param = :string");
        $stmt -> bindparam(':newName', $newName);
        $stmt -> bindparam(':newPhone', $newPhone);
        $stmt -> bindparam(':newEmail', $newEmail);
        $stmt -> bindparam(':newPass', $newPass);
        $stmt -> bindparam(':string', $string);

        return $stmt -> execute();
    }catch (PDOException $e){
        $file = fopen('errlog.txt', 'a+');
        $errMsg = "Error: " . $e->getMessage() . "at" . date("Y:m:d:(h:i)") . "\n";
        fwrite($file, $errMsg);
        return false; 
    }
}

function checkUser($email, $pass){
    // to check if password and email match eachother
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT pass FROM users WHERE email = :Email");
    $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $realPass = $result['pass'];
    //in the final version the database will save hashed passwords in sha2 we'll use passverify .....
    return (password_verify($pass, $realPass));
    // return ($pass === $realPass);
}

function fetchAllProducts(){
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db'); 
        $stmt = $conn -> prepare("SELECT * FROM posts");
        $stmt -> execute();
        while($row  = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
        return $result;
}

function createOrder($username, $productname, $price){
    $conn = new PDO('sqlite:/home/emmanuel/flowerly.db');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare("INSERT INTO orders (username, productname, price) VALUES (:username, :productname, :price)");
    $stmt -> bindParam(':username', $username);
    $stmt -> bindParam(':productname', $productname);
    $stmt -> bindParam(':price', $price);
    return $stmt -> execute();
}
