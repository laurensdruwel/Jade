<html>
<head>
<title>Add User</title>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <link type="text/css" rel="stylesheet" href="style/screen.css"/>
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

        <input type="submit" class="ui button" name="submit" value="Submit">

    </form>
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"
        crossorigin="anonymous"></script>


<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'Please enter your username';

    } else {

        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Please enter your email.';

    } else{

        // Trim white space from the name and store the name
        $email= trim($_POST['email']);

    }

    if(empty($_POST['passphrase'])){

        // Adds name to array
        $data_missing[] = 'Please enter your passphrase.';

    } else{

        // Trim white space from the name and store the name
        $passphrase= trim($_POST['passphrase']);

    }
//xx
    if(empty($_POST['passphraseTwo'])){

        // Adds name to array
        $data_missing[] = 'Please enter your passphrase a second time.';

    } else{

        // Trim white space from the name and store the name
        $passphraseTwo= trim($_POST['passphraseTwo']);
        if($passphrase != $passphraseTwo){
            $data_missing[] = 'Both passphrase entries must contain the same values';
        }

    }

    if(empty($data_missing)){

        require_once('mysqli_connect.php');

        $query = "INSERT INTO users (username, passphrase, email) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sss", $username, $passphrase, $email);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'User Entered';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {




        echo "<script>";
        echo '$("body").append("<div class=\"errorMsg ui raised very padded text container segment\"><p>The following errors have occured:</p></div>");';
        echo 'var errorMsg = ' . json_encode($data_missing) . ';';
        echo 'for(var i = 0; i < errorMsg.length; i++){ $(".errorMsg").append("<p>" + errorMsg[i] + "</p>");}';
        echo "</script>";
    }



}else{
    echo "not loaded";
}

?>

<script src="Semantic-UI-CSS-master/semantic.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>