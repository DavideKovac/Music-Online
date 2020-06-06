<?php

?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="AdminMusicOnline.css">
    <title>Music Online</title>
</head>
<body>
<img src="../images/logo_transparent.png" alt="logo"width="400"height="400">
<div class="pagetitle"><h1>Register</h1></div>

<div class="Register_forms">
    <form action="AdminSignUpScript.php" method="post">
        <table class="register" method="post">
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
