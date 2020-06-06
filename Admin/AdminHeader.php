<?php
require '../db_connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Music Online</title>
    <link rel="stylesheet" href="AdminMusicOnline.css">
</head>
<body>
<header>
<nav>
<div class="left_header">
    <a href="AdminHomepage.php">Home</a>
    <?php
    if(isset($_SESSION['AdminID'])){

    echo  '<a href="ReportedProducts.php">Reported Product</a>';
    }
    ?>
</div>
    <div class="right_header">
 <div class="log-out"><?php
     if(isset($_SESSION['AdminID'])){

         echo '<form action ="AdminLogoutScript.php" method="post"><button type="submit" name="log_out_btn">Log Out</button></form>';
     }
     ?>
 </div>
 </div>
</nav>
</header>
</body>
</html>