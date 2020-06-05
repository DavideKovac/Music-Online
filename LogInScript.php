<?php
if(isset($_POST['submit_login']))
{
require 'db_connection.php';

$username=$_POST['username'];
$password=$_POST['password'];
    if ( empty($username)|| empty($password))
    {
        header("Location: Login.php?error=emptyinfo&email".$username);
        exit();
    }
else{
    $strstmt="SELECT * FROM clients WHERE username=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$strstmt))
    {
        header("Location: Login.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $rs=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($rs))
        {
           $passcheck=password_verify($password,$row['password']);
           if($passcheck==false)
           {
               header("Location: Login.php?error=wrongpass");
               exit();
           }
           else if($passcheck==true)
           {
               session_start();
               $_SESSION['UserID']=$row['client_id'];
               $_SESSION['Username']=$row['username'];
               $_SESSION['Email']=$row['email'];

               header("Location: Homepage.php?success");
               exit();
           }
           else
           {
               header("Location: Login.php?error=sqlerror");
               exit();
           }


        }
        else{
            header("Location: Login.php?error=nouser");
            exit();
        }


    }
}

}
else{
    header("Location:Login.php");
    exit;
}