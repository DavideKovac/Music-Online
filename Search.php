<?php
include  'header.php';
?>
<div class="header">
    <img src="images/logo.png"width="200"length="200">
</div>
<form action="Search.php" method="POST">
    <div class="search_bar">
        <input type="text" class="search_box" name="search_box">
        <span class="input_text"><button type="submit" name="search_btn" class="search">Search</button></span>
    </div>
</form>
<div class="result_container">
    <h1>Results</h1>
    <?php
    if(isset($_POST['search_btn']))
    {
       $search=mysqli_real_escape_string($conn,$_POST['search_box']);
       $strstmt="SELECT * FROM cds WHERE title LIKE '%$search%' OR  artist LIKE '%$search%' OR  genre LIKE '%$search%' ";
       $rs=mysqli_query($conn,$strstmt);
       $qr=mysqli_num_rows($rs);
       if($qr>0)
       {
         while($row=mysqli_fetch_assoc($rs))
         {
             ?>
             <div class="product_info">
              <a href="Products.php?ID=<?php echo $row['cd_id'];?>"><img src="images/<?php echo $row['picture'];?>" width="300" height="300"></a>
               <span class="caption"><?php echo $row["title"];?> </span>
             </div>
       <?php
         }

       }
       else{
           echo "There are no results";
       }


    }

    ?>
</div>
