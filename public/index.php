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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dist/style.css">
    <title>FLOWERLY :HOME</title>
</head>
<body>
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
                echo '<li><a href="signup.php">account</a></li>';
            }
          ?>
          
          <button onclick="darkSide()" id="themeBut"><i class="fa-solid fa-moon" id="themeIcon"></i></button>
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
            <div class="cartcont">
                 <h1>' . $name . '\'s CART</h1>
            <table>
                     <tr>
                         <th>Product Name</th>
                         <th>Price</th>
                         <th>Quantity</th>
                     </tr>
                 <tbody>
         
                 </tbody>
            </table>
            </div>
            </div>';
            //floating cart button
        echo '<div class="shop" id="shop"  onclick="displayCart(event)"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></div>';
        }
    ?>
     <div id="products">
    <h2>products</h2>
    <div class="container">

        <?php
            foreach(fetchAllProducts() as $data){
        
                if(isset($data)){
                        echo "<div>";
                        echo '<img src= " ' . $data["url"] . '">';
                        echo "<p>". $data["head"] ."</p>";
                        echo "<p>". $data["description"] ."</p>";
                        if(isset($name)){
                            echo "<form action='' method='post'><button deets='". $data["id"] . "' name='addBtn' onclick='addToCart(". $data["id"] .")'><i class='fa-solid fa-dollar-sign'>". $data["price"] ."</i></button></form>";
                            echo"</div>";
                        }else{
                            echo "<a href='signup.php'><button ><i class='fa-solid fa-dollar-sign'>". $data["price"] ."</i></button></a>";
                            echo"</div>";
                        }
                    }                    
                }
            ?>
    </div>
    
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="main.js">

    
 </script>
</body>
</html>