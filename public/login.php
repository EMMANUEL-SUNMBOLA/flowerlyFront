<?php
    session_start();
    require('.././private/functions.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $error = "";
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        if(checkUser($email, $pass)){
            $result = getUser("email", $email);
            $name = $result['name'];
            $data = $result;
            //plan B: to send user credentials with session more advisible cos it's more secure
            $_SESSION['name'] = $name;
            //plan A: to send user credentials through url scripting, not secure, easily compromisable
            // header("Location:index.php?name=$name");
            
            header("Location:index.php");
        }else{
            echo "<div class='error-disp'><p class='msg'>INVALID CREDENTIALS</p></div>";
        }
    }
?>
    <?php require('head.php')?>
    <title>FLOWERLY| SIGNUP</title>
</head>
<body>
    <div id="nav">
        <ul>
            <li><span>FLOWERLY</span></li>
        </ul>
        <ul>
            <li>account</li>
        </ul>
    </div>

    <section  class="logMain">
        <div>
            <form action="" method="post">
                <h1>SIGN-IN</h1>
                <input type="text" name="email" id="" placeholder="EMAIL"><br>
                <!-- <input type="text" name="phone" id="" placeholder="PHONE"><br> -->
                <input type="password" name="pass" id="pass" placeholder="PASSWORD">
                <p class="eye" id="eye" onclick="togglePassVisibility(document.getElementById('pass'))"><i class="fa-solid fa-eye" ></i></p><br>
                <button type="submit">LOG-IN</button><br>
                <p>Don't have an account ? <a href="signup.php">SIGNUP</a></p>
                <p><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a><a href="#"><i class="fa-solid fa-arrow-right"></i></a></p>
            </form>
        </div>
    </section>
    <!-- <div class='error-disp'>
        <?php
            // if(!empty($_GET["error"])){
            //     $error = $_GET["error"];
            //     $errors = explode($error, "-");
            // }
        ?>
    </div> -->
    <script src="main.js"></script>
</body>
</html>