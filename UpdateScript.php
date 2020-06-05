<?php
require 'db_connection.php';
if(isset($_POST['update'])) {

    $ID=$_POST['cd_id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    if (!filter_var($quantity, FILTER_VALIDATE_INT)) {
        header("Location: Update.php?error=quantitynotaint&ID='$ID'");
        exit();

    } else if (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
        header("Location: Update.php?error=pricenotadouble&ID='$ID'");
        exit();
    }
    else {
        $strstmt = "UPDATE cds SET title=?,artist=?,genre=?,description=?,price=?,quantity=? WHERE cd_id='$ID'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $strstmt)) {
            header("Location: Update.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssdi", $title, $artist, $genre, $description, $price, $quantity);
            mysqli_stmt_execute($stmt);
            header("Location: AccountProduct.php?success".$ID);
            exit();


        }
    }
}
else
{
    header("Location: Update.php?unsuccess");
    exit();

}
