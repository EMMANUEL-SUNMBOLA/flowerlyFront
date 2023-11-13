<?php
    session_start();
    require('../private/functions.php');
    // if(!empty($_GET['name']) || !empty($_SESSION['name'])){
    if( !empty($_SESSION['name'])){
        // $name = $_GET['name'] ;
        $name = $_SESSION['name'];
        if(isset($_SESSION["product"])){
            
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
        <div>
            <img src="images/img-1.jpg" alt="">
            <p>PINK FLOWER BUSH</p>
            <p>best flower to buy for your loved ones</p>
            <?php
            // the button will lead the unknown user to the signup page
            //the button for new customers will have special functions to add to the user's cart, prolly to be saved in the database aswell, but by doing so each user will have a database for his cart
            //we should probably save their cart to their storage using sessions
            //i'll get to that soon
                if(isset($name)){
                    echo '<a href="signup.php"><button name=""><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>
        </div>
        <div>
            <img src="images/img-2.jpg" alt="">
            <p>amber sunflower</p>
            <p>this plant represents the sunflower tribe and it glows in the dark</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button name=""><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>
        </div>
        <div>
            <img src="images/img-3.jpg" alt="">
            <p>red rose bouquet</p>
            <p>very beautiful plant that can strive anywhere and anytime</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button name=""><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <div>
            <img src="images/img-4.jpg" alt="">
            <p>yellow rose bouquet</p>
            <p>this plant best strives in the summer, it can be a hassle to find in the winter</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button name=""><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';  
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <div>
            <img src="images/img-5.jpg" alt="">
            <p>white rose bouquet</p>
            <p>this is a mutated form of red roses, they are very beautiful  and can be dyed into anyother color</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button name=""><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <div>
            <img src="images/img-6.jpg" alt="">
            <p>red rose bush</p>
            <p>one of the most beautiful plants ever discovered and cheap as well
            </p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <div>
            <img src="images/img-7.jpg" alt="">
            <p>dragon lily</p>
            <p>this flower only grows where dragons live, with the dying population of dragons this plant is becoming extremely rare to find</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <div>
            <img src="images/img-8.jpg" alt="">
            <p>ozai's bush</p>
            <p>this flower only grows in the heart of the azulon's volcano, fire nation</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>       
        </div>
        <div>
            <img src="images/img-9.jpg" alt="">
            <p>hisoka bush</p>
            <p>one of the rarest flowers to get,they are very beautiful tho poisonious</p>
            <?php
                if(isset($name)){
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign" deets="ix">30.00</i></button></a>';
                }else{
                    echo '<a href="signup.php"><button><i class="fa-solid fa-dollar-sign">30.00</i></button></a>';
                }
            ?>        
        </div>
        <?php
            foreach(fetchAllProducts() as $data){
        
                if(isset($data)){
                    // foreach(fetchAllProducts() as $data){
                        
                        echo "<div>";
                        echo '<img src= " ' . $data["url"] . '">';
                        // echo $data["url"];
                        echo "<p>". $data["head"] ."</p>";
                        echo "<p>". $data["description"] ."</p>";
                        echo "<button deets='". $data["id"] . "'><i class='fa-solid fa-dollar-sign'>". $data["price"] ."</i></button>";
                        echo"</div>";
                    }
                    // }
                    
                }
            ?>
    </div>

 
 <script src="main.js">

    
 </script>
</body>
</html>