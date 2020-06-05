<?php
require 'db_connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="MusicOnline.css">
</head>
<body>
<header>
<nav>
<div class="left_header">
    <a href="Homepage.php">Home</a>
    <?php
    if(isset($_SESSION['UserID'])){

    echo  '<a href=#>Account</a>
           <a href="Sell.php">Sell</a>
           <a href="AccountProduct.php">Your Products</a>';
    }
    ?>
</div>
    <div class="right_header">
 <a href=""><img src="images/icons8-shopping-cart-96.png"width="25" length="25"></a>
 <div class="log-out"><?php
     if(isset($_SESSION['UserID'])){

         echo '<form action ="logoutScript.php" method="post"><button type="submit" name="log_out_btn">Log Out</button></form>';
     }
     else{
         echo'<form action ="LogInScript.php" method="post"><button type="submit" name="submit_login">Log In</button></form>';
     }
     ?>
 </div>
 </div>
</nav>
</header>
</body>
</html>