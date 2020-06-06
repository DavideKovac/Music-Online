<?php
if(isset($_POST['submit_login']))
{
    require '../db_connection.php';

    $email=$_POST['email'];
    $password=$_POST['password'];
    if ( empty($email)|| empty($password))
    {
        header("Location: AdminLogin.php?error=emptyinfo&email".$username);
        exit();
    }
    else{
        $strstmt="SELECT * FROM staffs WHERE email=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$strstmt))
        {
            header("Location: AdminLogin.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $rs=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($rs))
            {
                $passcheck=password_verify($password,$row['password']);
                if($passcheck==false)
                {
                    header("Location: AdminLogin.php?error=wrongpass");
                    exit();
                }
                else if($passcheck==true)
                {
                    session_start();
                    $_SESSION['AdminID']=$row['staff_id'];
                    $_SESSION['Username']=$row['email'];

                    header("Location: AdminHomepage.php?success");
                    exit();
                }
                else
                {
                    header("Location: AdminLogin.php?error=sqlerror");
                    exit();
                }


            }
            else{
                header("Location: AdminLogin.php?error=nouser");
                exit();
            }


        }
    }

}
else{
    header("Location:AdminLogin.php");
    exit;
}