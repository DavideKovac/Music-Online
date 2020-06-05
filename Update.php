<?php
include "header.php";
if(isset($_GET['ID'])) {
    $ID=mysqli_real_escape_string($conn,$_GET['ID']);
    $stmt="SELECT * FROM cds WHERE cd_id='$ID'";
    $res=mysqli_query($conn,$stmt);
    $row=mysqli_fetch_assoc($res);
}
else
{
    header("Location :AccountProduct.php");
    exit();
}
?>
<h1>Update</h1>
<?php
if(isset($_GET['error']) || isset($_POST['ID']))
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

}
?>
<div class="forms">
    <form action ="UpdateScript.php" method="POST">
        <table class="form_table">
            <tr>
                <td><label>Title:</label></td>
                <td><input type="text" name="title"value="<?php echo $row['title']?>"required><br /></td>
            </tr>
            <tr>
                <td><label>Artist:</label></td>
                <td><input type="text" name="artist"value="<?php echo $row['artist']?>"required><br /></td>
            </tr>
            <tr>
                <td><label>Genre:</label></td>
                <td><input type="text" name="genre"value="<?php echo $row['genre']?>"required><br /></td>
            </tr>
            <tr>
                <td><label>Price:</label></td>
                <td><input type="text" name="price"value="<?php echo $row['price']?>"required><br /></td>
            </tr>
            <tr>
                <td><label>Quantity:</label></td>
                <td><input type="text" name="quantity"  value="<?php echo $row['quantity'];?>"required><br /></td>
            </tr>
            <tr>
                <td><label>Description:</label></td>
                <td><textarea type="text" name="description" class="description" required><?php echo $row['description']?></textarea><br /></td>
            </tr>
            <tr>
                <input type="hidden" name="cd_id" value="<?php echo $row['cd_id'];?>">
            </tr>
            <tr>
                <td><button type="submit" name="update">Update</button></td>
            </tr>
        </table>
    </form>
</div>
    </body>

