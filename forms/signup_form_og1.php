<?php
//include('login.php'); // Includes Login Script
session_start();
if(isset($_SESSION['email_user'])){
header("location: ../php/welcome.php");
}
$error_email = json_decode(base64_decode($_GET['exists_email']),true);
$error =json_decode(base64_decode($_GET['success']),true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="../js/signup_form.js"></script>
    <link rel="stylesheet" href="../css/signup_form.css">
</head>


<body>
    <form action="../php/signup.php" id="myForm" method="post" >
    <?php include '../header.php'; ?>        
    <div class="container">
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="name" id="name_title"><b>Name</b></label>
            <span class="error" >*<?php echo $error['empty_name']; echo $error['nameErr']; ?></span>
            <input type="text" placeholder="Enter Name" name="user[name]" id="name" value="<?php echo $error['name']; echo $error_email['name'] ;?>">
            <label for="mob_no" id="mob_no_title"><b>Mobile number</b></label>
            <span class="error">*<?php echo $error['empty_mob_no']; echo $error['mob_noErr']; ?> </span>
            <input type="text" placeholder="Enter Mobile number" maxlength="10" onkeypress="return restrictAlphabets(event)" inputmode="number" name="user[mob_no]"
                id="mob_no" value="<?php echo $error['mob_no']; echo $error_email['mob_no']; ?>">

            <label for="email" id="email_title"><b>Email id</b></label>
            <span class="error">*<?php echo $error['empty_email']; echo $error['emailErr']; echo $error_email['email_exists']; ?></span>
            <input type="text" placeholder="Enter Email id" value="<?php echo $error['email']; echo $error_email['email']; ?>" name="user[email]" id="email">

            <label for="password" id="password_title"><b>Password</b></label>
            <span class="error">*<?php echo $error['empty_password']; echo $error['passwordErr'];?> </span>
            <input type="password" placeholder="Password" name="user[password]" value="<?php echo $error['password']; echo $error_email['password']; ?>" id="password">
            <input type="checkbox"
                onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show
            password</input>
            <div class="clearfix">
                <a href="../forms/user_form.php"> <button class="cancelbtn" type="button" id="login"
                        name="login">Login</button>
                    <button type="submit" class="signupbtn" id="submit" name="submit">Sign Up</button></a>
            </div>


        </div>
    </form>
    <div class= 'footer'>
        <?php include '../footer.php'; ?>
    <div>
</body>

</html>