<?php
if(isset($_POST['delete']))
{
    require '../db_connection.php';
    $ID=$_POST['cd_id'];
    $stmt = "DELETE FROM cds WHERE cd_id='$ID'";
        mysqli_query($conn,$stmt);
        header("Location: AdminHomepage.php?success".$ID);
        exit();

}
else
{
    header("Location: AdminHomepage.php?unsuccess".$ID);
    exit();
}
