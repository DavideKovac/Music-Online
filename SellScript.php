<?php
if(isset($_POST['sell'])) {
    require 'db_connection.php';
    session_start();

    $ID = $_SESSION['UserID'];
    $title = $_POST['title'];
    $title2=$_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $picture = $_FILES['picture'];
    //Picture error handling
    $picturename = $picture['name'];
    $pictureTmpName = $picture['tmp_name'];
    $pictureSize = $picture['size'];
    $pictureError = $picture['error'];


    $pictureGetExt = explode('.', $picturename);
    $pictureExt = strtolower(end($pictureGetExt));

    $allowedExt = array('jpg', 'jpeg', 'png');
    if (!filter_var($quantity, FILTER_VALIDATE_INT)) {
        header("Location: Sell.php?error=quantitynotaint");
        exit();

    } else if (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
        header("Location: Sell.php?error=pricenotadouble");
        exit();
    }
    else if($pictureError!==0)
    {
        header("Location: Sell.php?error=fileerror");
        exit();
    }
    else if($pictureSize>100000000)
    {
        header("Location: Sell.php?error=filetoobig");
        exit();
    }

    else if(!in_array($pictureExt, $allowedExt)){
          header("Location: Sell.php?error=fileextnotallowed");
            exit();
}
   else
    {
        $strstmt1 = "INSERT INTO cds(title,artist,genre,description,price,quantity,picture,client_id) VALUES(?,?,?,?,?,?,?,?)";
        $stmt1 = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt1, $strstmt1)) {
            header("Location: Sell.php?error=sqlerror");
            exit();
        }
        else {
            $pictureNewName = uniqid('', true) . "." . $pictureExt;
            $pictureDest = 'images/' . $pictureNewName;
            move_uploaded_file($pictureTmpName, $pictureDest);
            mysqli_stmt_bind_param($stmt1,"ssssdisi",$title,$artist,$genre,$description,$price,$quantity,$pictureNewName,$ID);
            mysqli_stmt_execute($stmt1);
            header("Location: AccountProduct.php?success");
            exit();



            }
        }

    }
else
{
    header("Location: Sell.php?unsuccess");
    exit();

}





