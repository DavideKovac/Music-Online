<?php
include 'header.php';
?>
<h1>Your Products</h1>
<section class="albums">
    <div class="subtitle">
        <p>Yours Albums <a href="">see more</a></p>
    </div>
    <?php
    $ID = $_SESSION['UserID'];
    $res=mysqli_query($conn,"SELECT cd_id,title,picture FROM cds WHERE client_id='$ID'");
    while($row=mysqli_fetch_array($res))
    {
        ?>
        <div class="product_info">
            <a href="Products.php?ID=<?php echo $row['cd_id'];?>"><img src="images/<?php echo $row['picture'];?>" width="300" height="300"></a>
            <span class="caption"><?php echo $row["title"]; ?></span>
            <a href="Update.php?ID=<?php echo $row['cd_id'];?>">Update</a>
        </div>
        <?php
    }
    ?>
</section>
