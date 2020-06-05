<?php

?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="MusicOnline.css">
    <title>Music Online</title>
</head>
<body>
<img src="images/logo_transparent.png" alt="logo"width="400"height="400">
<div class="back"><a href="Menu.html" class="back"><p>Back</p></a></div>
<div class="pagetitle"><h1>Register</h1></div>
<?php
if(isset($_GET['error']))
{
    if($_GET['error']=="invalidusernamesndemail")
    {
        echo '<p class="errormessage">Invalid Username & email</p>';
    }
    else if($_GET['error']=="invalidusername")
    {
        echo '<p class="errormessage">Invalid Username </p>';
    }
    else if($_GET['error']=="invalidemail")
    {
        echo '<p class="errormessage">Invalid Email</p>';
    }
    else if($_GET['error']=="passwordnotmatch")
    {
        echo '<p class="errormessage">Passwords dont match</p>';
    }
    else if($_GET['error']=="usernametaken")
    {
        echo '<p class="errormessage">Username already in use</p>';
    }
}
?>
<div class="Register_forms">
    <form action="SignUpScript.php" method="post">
        <table class="register" method="post">
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" name="username" required><br /></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="text" name="email" required><br /></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password" required><br /></td>
            </tr>
            <tr>
                <td><label>Confim password:</label></td>
                <td><input type="password" name="repeat_password" required><br /></td>
            </tr>
            <tr>
                <td><button type="submit" name="register">Sign Up</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
