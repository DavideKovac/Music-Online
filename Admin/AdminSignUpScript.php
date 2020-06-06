<?php
if(isset($_POST['register']))
{
    require '../db_connection.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repeatPassword=$_POST['repeat_password'];
    if (empty($email)|| empty($password)|| empty($repeatPassword))
    {
        header("Location: AdminSignUp.php?error=emptyinfo&username=".$username."&email".$email);
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        header("Location: AdminSignUp.php?error=invalidusernameandemail");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location: AdminSignUp.php?error=invalidemail&username=".$username."&email".$email);
        exit();
    }
    else if($password!==$repeatPassword)
    {
        header("Location: AdminSignUp.php?error=passwordnotmatch&username=".$username."&email=".$email);
        exit();
    }

            else
            {
                $strstmt="INSERT INTO staffs(email,password) VALUES(?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$strstmt))
                {
                    header("Location: AdminSignUp.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $encriptedPass=password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ss",$email,$encriptedPass);
                    mysqli_stmt_execute($stmt);
                    header("Location: AdminSignUp.php?success");
                    exit();
                }

            }
        }

else{
    header("Location: AdminSignUp.php");
    exit();
}





