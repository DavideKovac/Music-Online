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
<div class="pagetitle"><h1>Log In</h1></div>
<?php
if(isset($_GET['error']))
{
    if($_GET['error']=="emptyinfo")
    {
        echo '<p class="errormessage">Information are missing</p>';
    }
    else if($_GET['error']=="sqlerror")
    {
        echo '<p class="errormessage">There is an error in the server</p>';
    }
    else if($_GET['error']=="wrongpass")
    {
        echo '<p class="errormessage">Invalid Password</p>';
    }
    else if($_GET['error']=="nouser")
    {
        echo '<p class="errormessage">No user found</p>';
    }
}
?>
<div class="log_in_forms">
    <form action ="LogInScript.php" method="post">
        <table class="login">
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" name="username" required><br /></td>
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
