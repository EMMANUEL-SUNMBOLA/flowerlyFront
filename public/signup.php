<?php
    session_start();
    require('../private/functions.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $name = strip_tags($_POST["name"]);
        $phone = strip_tags($_POST["phone"]);
        $email = strip_tags($_POST["email"]);
        $pass = strip_tags($_POST["pass"]);

        //Reg as in Regex to check for patterns    $nameReg = "/[a-zA-Z]/";
        //check regex for blockage, function worked until i added the regex and checks

        $nameReg = "/[a-zA-Z]/";
        $phoneReg = '/[0-9+]/';
        $emailReg = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $passReg = '/[a-zA-Z0-9]/';

        if((!preg_match($nameReg, $name))){
            $err[] = "Invalid Name";
        }

        if(!preg_match($phoneReg, $phone) || (strlen($phone) !== 11)){
            $err[] = "Invalid Phone";    
        }elseif((FindUser('phone', $phone)) ){
            $err[] = "User already exists";    
        }
        
        if(!preg_match($passReg, $pass) || (strlen($pass) < 6)){
            $err[] = "Invalid Password";    
        }

        if(!preg_match($emailReg, $email) || (strlen($email) > 256)){
            $err[] = "Invalid Email";    
        }elseif( (FindUser('email', $email)) ){
            $err[] = "User already exists";        
        }

        // if(checkUser($email, $pass)){
        //     $result = FindUser("email", $email);
        //     $name = $result['name'];
        //     $data = $result;
        //     //plan B: to send user credentials with session more advisible cos it's more secure
        //     $_SESSION['name'] = $name;
        //     //plan A: to send user credentials through url scripting, not secure, easily compromisable
        //     // header("Location:index.php?name=$name");
        //     header("Location:index.php");
        // }
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dist/signup.css">
    <title>FLOWERLY| SIGNUP</title>
</head>
<body>
    <nav>
        <ul>
            <li><span>FLOWERLY</span></li>
        </ul>
        <ul>
            <li>account</li>
        </ul>
    </nav>

    <main>

        <div>
            <form action="" method="post">
                <h1>SIGNUP</h1>
                <input type="text" name="name" id="name" placeholder="USERNAME" oninput="invalidName()">
                <input type="text" name="email" id="email" placeholder="EMAIL" oninput="validateEmail()"><br>

                <input type="text" name="phone" id="num" placeholder="PHONE" oninput="invalidNum()">

                <input type="password" name="pass" id="pass" placeholder="PASSWORD" oninput="validatePass()">
                <p class="eye" id="eye" onclick="togglePassVisibility(document.getElementById('pass'))"><i class="fa-solid fa-eye" ></i></p>
                <br>
                <input type="password" name="pass2" id="pass2" placeholder="CONFIRM PASSWORD" oninput="confirmPass()">
                <p class="eye" id="eye2" onclick="togglePassVisibility(document.getElementById('pass2'))"><i class="fa-solid fa-eye"></i></p><br>
                <button type="submit" name="signUpBut">CREATE</button><br>
                <p class="errorDisp">
                <?php
                  if((isset($_POST["signUpBut"])) && (!empty($_SESSION["errors"]))){
                      echo "<ul>";
                      foreach($_SESSION["errors"] as $err){
                          echo "<li>". $err ."</li>";
                      }
                      echo "</ul>";
                  }
                ?>
                </p>
                <p>Already have an account ? <a href="login.php">SIGNIN</a></p>
                <p><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a><a href="#"><i class="fa-solid fa-arrow-right"></i></a></p>
            </form>
        </div>
        
    </main>
    <div class="error-disp">
            <?php
                    echo "<p class='msg'>";
                    if(isset($_POST["signUpBut"])){
                    if(empty($err) && (createUser($name, $email, $phone, hashPass($pass)))){
                        //if(empty($err) && (createUser($name, $email, $phone, $pass))){
                            echo "Account Created Successfully, now <a href='login.php'>Login</a>";
                    }else{
                        echo "Error while creating ACCOUNT" ;
                        foreach($err as $error){
                            echo $error;
                        }
                    }
                    echo"</p>";
                }
            ?>
        </div>
    <script src="main.js"></script>
    </body>
</html>