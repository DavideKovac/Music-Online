<?php
include'header.php';
?>

<?php

if(isset($_GET['ID']))
{
    $ID=mysqli_real_escape_string($conn,$_GET['ID']);
    $stmt="SELECT * FROM cds WHERE cd_id='$ID'";
    $res=mysqli_query($conn,$stmt);
    $row=mysqli_fetch_array($res);
    $stmt2="SELECT cd_id,title,picture,artist FROM cds WHERE genre=(SELECT genre FROM cds WHERE cd_id='$ID')AND cd_id!='$ID' LIMIT 0,4";
    $res2=mysqli_query($conn,$stmt2);
}
else{
    header("Location :Homepage.php");
    exit();
}
?>
<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="MusicOnline.css">
</head>
<body>
<div class="prod_top">
<h>Music Online</h>
</div>
<section class="product_display">
    <div class="container">
     <div class="row justify-content-between">
              <div class="col-5">
                 <img src="images/<?php echo $row['picture'];?>" width="500" height="500">
              </div>
         <div class="col-5">
             <h2><?php echo $row['title'] ?></h2>
             <h3><?php echo $row['artist'] ?></h3>
             <p><?php echo $row['genre'] ?></p>
             <p>Items Available: <?php echo $row['quantity'] ?></p>
             <p>£ <?php echo $row['price'] ?></p>
             <p><?php echo $row['description'] ?></p>
             <label>Quantity: </label>
             <input type="text" class="quantity_box">
             <button type="button" class="btn_cart">Add to Cart</button>
         </div>
     </div>
    </div>
</section>
<section class="similar_products">
     <p>Similar Albums <a href="">see more</a></p>
     <div class="suggested_album">
         <?php
         while($row2=mysqli_fetch_array($res2))
         {
             ?>
             <div class="product_info">
                 <a href="Products.php?ID=<?php echo $row2['cd_id'];?>"><img src="images/<?php echo $row2['picture'];?>" width="300" height="300"></a>
                 <span class="caption"><?php echo $row2["title"]; ?></span>
             </div>
             <?php
         }
         ?>
     </div>
</section>
</body>