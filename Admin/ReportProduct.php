<?php
if(isset($_POST['report']))
{
    require '../db_connection.php';
    session_start();
    $STAFFID = $_SESSION['AdminID'];
    $ID=$_POST['cd_id'];
    $stmt = "INSERT INTO reported_cds (staff_id,cd_id) VALUES('$STAFFID','$ID')";
    mysqli_query($conn,$stmt);
    header("Location: AdminHomepage.php?success");
    exit();

}
else
{
    header("Location: AdminHomepage.php?unsuccess");
    exit();
}