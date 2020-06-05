<?php
if(isset($_POST['register']))
{
    require 'db_connection.php';
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repeatPassword=$_POST['repeat_password'];
if (empty($username)|| empty($email)|| empty($password)|| empty($repeatPassword))
{
    header("Location: Register.php?error=emptyinfo&username=".$username."&email".$email);
    exit();
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
{
    header("Location: Register.php?error=invalidusernameandemail");
    exit();
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    header("Location: Register.php?error=invalidemail&username=".$username."&email".$email);
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
{
    header("Location: Register.php?error=invalidusername&email".$email);
    exit();
}
else if($password!==$repeatPassword)
{
    header("Location: Register.php?error=passwordnotmatch&username=".$username."&email=".$email);
    exit();
}
else
{
    $strstmt="SELECT username FROM clients WHERE username=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$strstmt))
    {
        header("Location: Register.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rsc=mysqli_stmt_num_rows($stmt);
        if($rsc>0)
        {
            header("Location: Register.php?error=usernametaken&email=".$email);
            exit();

        }
        else
        {
            $strstmt="INSERT INTO clients(username,email,password) VALUES(?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$strstmt))
            {
                header("Location: Register.php?error=sqlerror");
                exit();
            }
            else
                {
                    $encriptedPass=password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$encriptedPass);
                    mysqli_stmt_execute($stmt);
                    header("Location: Login.php");
                    exit();
                }

        }
    }


}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
header("Location: Register.php");
exit();
}




