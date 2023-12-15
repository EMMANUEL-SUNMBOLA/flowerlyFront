<?php

if($_SESSION["status"] !== "loggedIn"){
    header("Location:index.php");
}?>
    


    <?php include('head.php')?>
    <title>FLOWERLY</title>
</head>
<body id="body">

 <nav id="nav">
    <ul class="nav-brand">
      <li><a href="">FLOWERLY</a></li>
    </ul>
    <ul class="nav-cont nav-menu" data-visible="false">
      <li><a href="#products">products</a></li>
      <li><a href="#contact">contact</a></li>
      <li><a href="#about">about</a></li>
      <li><a href="signup.html">account</a></li>
      <button onclick="darkSide()" id="themeBut"><i class="fa-solid fa-moon" id="themeIcon"></i></button>
    </ul>

 </nav>

 <main>
    <div>
        <p>FLOWERLY</p>
        <p>NATURAL AND BEAUTIFUL</p>
        <p>WE DELIVER NATIONWIDE</p>
        <p><button href="#" onclick="window.location.href = '#products';">Shop Now</button></p>
    </div>
 </main>

 <div id="products">
    <h2>products</h2>
    <div class="container">
        <div>
            <img src="images/img-1.jpg" alt="">
            <p>PINK FLOWER BUSH</p>
            <p>best flower to buy for your loved ones</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-2.jpg" alt="">
            <p>amber sunflower</p>
            <p>this plant represents the sunflower tribe and it glows in the dark</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-3.jpg" alt="">
            <p>red rose bouquet</p>
            <p>very beautiful plant that can strive anywhere and anytime</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-4.jpg" alt="">
            <p>yellow rose bouquet</p>
            <p>this plant best strives in the summer, it can be a hassle to find in the winter</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-5.jpg" alt="">
            <p>white rose bouquet</p>
            <p>this is a mutated form of red roses, they are very beautiful  and can be dyed into anyother color</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-6.jpg" alt="">
            <p>red rose bush</p>
            <p>one of the most beautiful plants ever discovered and cheap as well
            </p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-7.jpg" alt="">
            <p>dragon lily</p>
            <p>this flower only grows where dragons live, with the dying population of dragons this plant is becoming extremely rare to find</p>
            <button><i class="fa-solid fa-dollar-sign">500.00</i></button>
        </div>
        <div>
            <img src="images/img-8.jpg" alt="">
            <p>ozai's bush</p>
            <p>this flower only grows in the heart of the azulon's volcano, fire nation</p>
            <button><i class="fa-solid fa-dollar-sign">30.00</i></button>
        </div>
        <div>
            <img src="images/img-9.jpg" alt="">
            <p>hisoka bush</p>
            <p>one of the rarest flowers to get,they are very beautiful tho poisonious</p>
            <button><i class="fa-solid fa-dollar-sign">300.00</i></button>
        </div>
    </div>
 </div>

 <div id="contact">
    <h2>contact</h2>
    <div>
        <p>Do you want to make a special order ? have a question? or you want be an affliate?</p>
        <p>No matter your needs, we're here to solve them</p>
        <p><a href="tel:09030408140">tel:09030408140</a></p>
        <form action="" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name"><br>
            <label for="email">Email</label><br>
            <input type="text" name="email"><br>
            <label for="message">Message</label><br>
            <input type="text" name="message"><br>
            <button type="submit">SHOOT</button>
        </form>
    </div>
 </div>

 <!-- <div id="about">
    <div>
        <span><i class="fa-brands fa-github"></i></span>
        <span><i></i></span>
    </div>
    <h2 class="line"></h2>
    <p>cavecodes 2025 copyrights &copy</p> -->
 </div>
 <script src="main.js"></script>
</body>
</html>