<?php
//include('session.php');
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../../forms/user_form.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/welcome.css">
</head>

<body>
    <div class="container">
        <div id="profile">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['email_user']; ?></i></b>
            <!-- <b id="logout"><a href="logout.php"><>Log Out</a></b> -->
            <a href="../../php/user/user_logout.php">
                <span id="logout" class="glyphicon glyphicon-log-out"></span>
            </a>
        </div>
        <hr>
       
    </div>
</body>

</html>