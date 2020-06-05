<?php
include 'header.php';

?>

<head>
    <title>Music Online Homepage</title>
    <link rel="stylesheet" type="text/css" href="MusicOnline.css">
</head>
<body>
<div class="main page">
<div class="header">
<img src="images/logo.png"width="200"length="200">
</div>
<form action="Search.php" method="POST">
<div class="search_bar">
<input type="text" class="search_box" name="search_box">
<span class="input_text"><button type="submit" name="search_btn" class="search">Search</button></span>
</div>
</form>
    <div class="shop">
<section class="categories">
<div class="subtitle">
<p>Genres  <a href>see more</a></p>
</div>
<div class="cat">
<img src="images/Jazz.jpeg">
    <span class="caption">Jazz</span>
</div>
    <div class="cat">
        <img src="images/rock.jpg">
        <span class="caption">Rock</span>
    </div>
    <div class="cat">
        <img src="images/pop.jpg">
        <span class="caption">Pop</span>
    </div>
    <div class="cat">
        <img src="images/Classical.jpg">
        <span class="caption">Classical</span>
    </div>
    <div class="cat">
        <img src="images/hip hop.jpg">
        <span class="caption">Hip-Hop</span>
    </div>
</section>
<section class="albums">
    <div class="subtitle">
    <p>Albums <a href="">see more</a></p>
    </div>
    <?php
    $res=mysqli_query($conn,"SELECT cd_id,title,picture FROM cds ORDER BY RAND() LIMIT 5");
    while($row=mysqli_fetch_array($res))
    {
    ?>
    <div class="product_info">
    <a href="Products.php?ID=<?php echo $row['cd_id'];?>"><img src="images/<?php echo $row['picture'];?>" width="300" height="300"></a>
    <span class="caption"><?php echo $row["title"]; ?></span>
    </div>
    <?php
    }
    ?>
</section>
</div>
</div>
</body>