<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="MusicOnline.css">
</head>
<body>
<div class="pagetitle"><h1>Sell</h1></div>
<?php
if(isset($_GET['error']))
{
    if($_GET['error']=="quantitynotaint")
    {
        echo '<p class="errormessage">Quantity format is wrong</p>';
    }
    else if($_GET['error']=="pricenotadouble")
    {
        echo '<p class="errormessage">Price format is wrong</p>';
    }
    else if($_GET['error']=="sqlerror")
    {
        echo '<p class="errormessage">Database problem</p>';
    }
    else if($_GET['error']=="fileerror")
    {
        echo '<p class="errormessage">Error when uploading the picture</p>';
    }
    else if($_GET['error']=="filetoobig")
    {
        echo '<p class="errormessage">The file is too big</p>';
    }
    else if($_GET['error']=="fileextnotallowed")
    {
        echo '<p class="errormessage">The file is not a picture</p>';
    }
}
?>
    <form action ="SellScript.php" method="POST" enctype="multipart/form-data">
        <table class="form_table">
            <tr>
                <td><label>Title:</label></td>
                <td><input type="text" name="title" required><br /></td>
            </tr>
            <tr>
                <td><label>Artist:</label></td>
                <td><input type="text" name="artist" required><br /></td>
            </tr>
            <tr>
                <td><label>Genre:</label></td>
                <td><input type="text" name="genre" required><br /></td>
            </tr>
            <tr>
                <td><label>Price:</label></td>
                <td><input type="text" name="price" required><br /></td>
            </tr>
            <tr>
                <td><label>Quantity:</label></td>
                <td><input type="text" name="quantity" required><br /></td>
            </tr>
            <tr>
                <td><label>Description:</label></td>
                <td><textarea type="text" name="description" class="description" required></textarea><br /></td>
            </tr>
            <tr>
                <td><label>Image</label></td>
                <td><input type="file" name="picture"><br /></td>
            </tr>
            <tr>
                <td><button type="submit" name="sell">Sell</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
