<?php
require 'AdminHeader.php';
?>
<body>
<img src="../images/logo_transparent.png" alt="logo"width="200"height="200">
<div class="pagetitle"><h1>Homepage</h1>
<h2>Admin</h2>
</div>
<form action="AdminSearch.php" method="POST">
    <div class="search_bar">
        <input type="text" class="search_box" name="search_box">
        <span class="input_text"><button type="submit" name="search_btn" class="search">Search</button></span>
    </div>
</form>
<?php
if(isset($_SESSION['AdminID']))
{
    $res=mysqli_query($conn,"SELECT cd_id,title,picture FROM cds ");
    while($row=mysqli_fetch_array($res))
    {
    ?>
     <div class="product_info">
    <a href="AdminProducts.php?ID=<?php echo $row['cd_id'];?>"><img src="../images/<?php echo $row['picture'];?>" width="300" height="300"></a>
    <span class="caption"><?php echo $row["title"]; ?></span>
    </div>
<?php
}

}
?>
</body>
