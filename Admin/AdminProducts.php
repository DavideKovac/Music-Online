<?php
include'AdminHeader.php';
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
<link rel="stylesheet" type="text/css" href="AdminMusicOnline.css">
</head>
<body>
<div class="prod_top">
<h>Music Online</h>
</div>
<section class="product_display">
    <div class="container">
     <div class="row justify-content-between">
              <div class="col-5">
                 <img src="../images/<?php echo $row['picture'];?>" width="500" height="500">
              </div>
         <div class="col-5">
             <h2><?php echo $row['title'] ?></h2>
             <h3><?php echo $row['artist'] ?></h3>
             <p><?php echo $row['genre'] ?></p>
             <p>Items Available: <?php echo $row['quantity'] ?></p>
             <p>£ <?php echo $row['price'] ?></p>
             <p><?php echo $row['description'] ?></p>
             <div class="buttons">
                 <form action ="DeleteProduct.php" method="POST">
                     <input type="hidden" name="cd_id" value="<?php echo $row['cd_id'];?>">
                     <button type="submit" name="delete">Delete</button>
                 </form>
             <form action ="ReportProduct.php" method="POST">
                 <input type="hidden" name="cd_id" value="<?php echo $row['cd_id'];?>">
                 <button type="submit" name="report">Report</button>
                 </form>
         </div>
         </div>
     </div>
    </div>
</section>
</body>