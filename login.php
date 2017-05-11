<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon"
          type="image/png"
          href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <link type="text/css" rel="stylesheet" href="style/screen.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>





<div class="ui raised very padded text container  segment">
    <form class="ui form"  method="post">
        <h2>Welcome to Jade!</h2>
        <div class="field">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="field">
            <label>Passphrase</label>
            <input type="password" name="passphrase" placeholder="Passphrase">
        </div>

        <input type="submit" class="ui button" name="login" >
        <a href="register.php" class="ui button" >Register</a>
    </form>
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"
        crossorigin="anonymous"></script>
<?php
require_once('mysqli_connect.php');
SignIn($dbc);

?>


<script src="Semantic-UI-CSS-master/semantic.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>