<?php
    //I'm currently learning PHP-OOP so I want to 
    //try to implement this code with OOP

    class User{
        public $username;
        private $email;
        private $phone;
        private $conn;
        protected $password;

        //constructor works
        public function __construct($username, $email, $phone, $password){
            $this->username = $username;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->conn = null;
            $file = fopen('log.txt', "a+");
            try{
                $this->conn = new PDO('sqlite:/home/emmanuel/test.db');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->conn->prepare("INSERT INTO users (name, phone, email, pass) VALUES (:name, :phone, :email, :pass)");
                $stmt -> bindParam(':name', $this->username);
                $stmt -> bindParam(':phone', $this->phone);
                $stmt -> bindParam(':email', $this->email);
                $stmt -> bindParam(':pass', $this->password);
                $stmt -> execute();
                fwrite($file, "User Created Successfuly at " . date('h:i') . PHP_EOL);
            }catch(PDOException $e){
                fwrite($file, "Something went wrong" . $e . " at " . date('h:i') . PHP_EOL);
            }finally{
                fclose($file);
            }
        }
    }