<?php
include 'AdminHeader.php';
?>
<h1>Reported Products</h1>
<section class="albums">
    <?php
    $stmt=mysqli_query($conn,"SELECT * FROM reported_cds");;
    while($row1=mysqli_fetch_array($stmt)) {
        $id=$row1['cd_id'];
        $res = mysqli_query($conn, "SELECT cd_id,title,picture,client_id FROM cds WHERE cd_id='$id'");
        while ($row = mysqli_fetch_array($res)) {

            ?>
            <div class="product_info">
                <a href="AdminProducts.php?ID=<?php echo $row['cd_id']; ?>"><img
                            src="../images/<?php echo $row['picture']; ?>" width="300" height="300"></a>
                <span class="caption"><?php echo $row["title"]; ?></span>
                <span class="caption">Client ID: <?php echo $row["client_id"]; ?></span>
                <span class="caption">Staff ID: <?php echo $row1["staff_id"]; ?></span>
            </div>
            <?php
        }
    }
    ?>
</section>
