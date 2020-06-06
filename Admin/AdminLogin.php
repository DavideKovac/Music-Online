<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="AdminMusicOnline.css">
    <title>Music Online</title>
</head>
<body>
<img src="../images/logo_transparent.png" alt="logo"width="400"height="400">
<div class="pagetitle"><h1>Log In</h1></div>
<h2>Admin</h2>
<?php
if(isset($_GET['error']))
{
    if($_GET['error']=="emptyinfo")
    {
        echo '<p class="errormessage">Empty Info</p>';
    }
    else if($_GET['error']=="wrongpass")
    {
        echo '<p class="errormessage">Wrong Password</p>';
    }
    else if($_GET['error']=="sqlerror")
    {
        echo '<p class="errormessage">Sql Error</p>';
    }
    else if($_GET['error']=="nouser")
    {
        echo '<p class="errormessage">No user find</p>';
    }
}
?>
<div class="log_in_forms">
    <form action ="AdminLogInScript.php" method="post">
        <table class="login">
            <tr>
                <td><label>Email:</label></td>
                <td><input type="text" name="email" required><br /></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password" required><br /></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit_login">Log In</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
