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
    <?php include '../header.php'; ?>
    <div class="container">
    <div id="h1"><h1><span>Sign Up</span></h1></div>
        <form action="../php/signup.php" id="myForm" method="post">
            <div class="form-group">
                <label for="name" id="name_title">Name:</label>
                <span class="error">*<?php echo $error['empty_name']; echo $error['nameErr']; ?></span>
                <input type="text" class='form-control' placeholder="Enter Name" name="user[name]" id="name"
                    value="<?php echo $error['name']; echo $error_email['name'] ;?>">
            </div>

            <div class="form-group">
                <label for="mob_no" id="mob_no_title"><b>Mobile number</b></label>
                <span class="error">*<?php echo $error['empty_mob_no']; echo $error['mob_noErr']; ?> </span>
                <input type="text" class="form-control" placeholder="Enter Mobile number" maxlength="10"
                    onkeypress="return restrictAlphabets(event)" inputmode="number" name="user[mob_no]" id="mob_no"
                    value="<?php echo $error['mob_no']; echo $error_email['mob_no']; ?>">
            </div>

            <div class="form-group">
                <label for="email" id="email_title"><b>Email id</b></label>
                <span
                    class="error">*<?php echo $error['empty_email']; echo $error['emailErr']; echo $error_email['email_exists']; ?></span>
                <input type="text" class="form-control" placeholder="Enter Email id"
                    value="<?php echo $error['email']; echo $error_email['email']; ?>" name="user[email]" id="email">
            </div>

            <div class="form-group">
                <label for="password" id="password_title"><b>Password</b></label>
                <span class="error">*<?php echo $error['empty_password']; echo $error['passwordErr'];?> </span>
                <input type="password" class="form-control" placeholder="Password" name="user[password]"
                    value="<?php echo $error['password']; echo $error_email['password']; ?>" id="password">
                <input type="checkbox"
                    onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show
                password</input>
            </div>
            <div class='row'>
                <!-- <div class='col-lg-6'>
                    <a href="../forms/user_form.php"><button type="button" class="btn btn-primary btn-block"
                            id="redirect">login</button>
                    </a></div> -->
                <div class='col-lg-3'>
                    <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Submit</button>
                </div>
            </div>
            <hr>
            <div>
                <p>Have an account? <a href="../forms/user_form.php"><i>log in</i></a></p>
            </div>

            <div class='error'>
                <?php echo $error['invalid'] ?>
            </div>

        </form>
    </div>
    <?php include '../footer.php'; ?>

</body>

</html>