<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <link type="text/css" rel="stylesheet" href="style/screen.css"/>
    <link rel="icon"
          type="image/png"
          href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="ui raised very padded text container  segment">
    <form class="ui form" method="post" action="http://localhost:81/Jade/userAdded.php">
        <h2>Welcome to Jade!</h2>
        <h3>Registration</h3>
        <div class="field">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" value="">
        </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
        <div class="field">
            <label>Passphrase</label>
            <input type="password" name="passphrase" placeholder="Passphrase" value="">
        </div>
            <div class="field">
                <label>Passphrase</label>
                <input type="password" name="passphraseTwo" placeholder="Passphrase">
            </div>
        <a href="login.php" class="ui button" >Back</a>
        <input type="submit" class="ui button" name="submit" value="Submit">

    </form>
</div>






<script type="text/javascript" src="js/jquery-3.2.1.min.js"
        crossorigin="anonymous"></script>


<script src="Semantic-UI-CSS-master/semantic.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>