<?php
    session_start();
    require('../private/functions.php');
    // if(!empty($_GET['name']) || !empty($_SESSION['name'])){
    if( !empty($_SESSION['name'])){
        // $name = $_GET['name'] ;
        $name = $_SESSION['name'];
        if((isset($_POST["addBtn"])) && !empty($_SESSION['cart'])){
            echo '<script>';
            if(isset($_SESSION["cart"])){
                $data = $_SESSION["cart"];
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $cartContent = implode(', ', $_SESSION['cart']);
                    echo "alert('Cart: ')";
                }
                
            }else{
                echo "alert('cart is empty')";
            }
            echo '</script>';
        }
    }
    
    if(isset($_GET["logOut"])){
        session_destroy();
        header("Location:login.php");
    }


?>
    <?php include('head.php')?>
    <title>FLOWERLY :HOME</title>
</head>
<body class="light">
    <nav id="nav">
   
        <ul class="nav-brand">
          <li><a href="">FLOWERLY</a></li>
        </ul>
        <ul class="nav-cont nav-menu" data-visible="false">
          <li><a href="#products">products</a></li>
          <li><a href="#contact">contact</a></li>
          <li><a href="#about">about</a></li>
          <?php
            if(isset($name)){
                echo '<li><a href="user.php">Hi,' . $name . '</a></li>';
            }else{
                echo '<li><a href="login.php">account</a></li>';
            }
          ?>
          
          <button id="themeBut"><i class="fa-solid fa-moon" id="themeIcon"></i></button>
          <?php
            if(isset($name)){
                echo ' <form action="">
                <button name="logOut" id="themeBut" >Log-Out</button>
                </form>';
            }
          ?>
         
        </ul>
   
    </nav>
    <div class="main">
        <h1>Welcome To <span>FLOWERLY</span></h1>
        <p>The home of quality plants</p>
    </div>
    <?php
    // floating menu
          if(isset($name)){
            echo ' <div id="shopcart">
            <h1>' . $name . '\'s CART</h1>
            <div class="cartcont">

            </div>
            </div>';
            //floating cart button
        echo '<div class="shop" id="shop"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></div>';
        }
    ?>
     <div id="products">
    <h2>products</h2>
    <div class="container">

        <?php
            foreach(fetchAllProducts() as $data){
        
                if(isset($data)){
                        echo "<div class='product'>";
                        echo '<img src= " ' . $data["url"] . '">';
                        echo "<p>". $data["head"] ."</p>";
                        echo "<p>". $data["description"] ."</p>";
                        if(isset($name)){
                            echo "<button class='addBtn'><i class='fa-solid fa-dollar-sign'>". $data["price"] ."</i></button>";
                            echo"</div>";
                        }else{
                            echo "<a href='signup.php'><button ><i class='fa-solid fa-dollar-sign'>". $data["price"] ."</i></button></a>";
                            echo"</div>";
                        }
                    }                    
                }
            ?>
    </div>
    
 <script src="main.js">

    
 </script>
</body>
</html>