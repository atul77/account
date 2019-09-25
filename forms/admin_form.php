<?php
session_start();
if(isset($_SESSION['email_user'])){
header("location: ../php/welcome.php");
}
$error =json_decode(base64_decode($_GET['invalid']),true);


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="../../js/login_form.js"></script>
	<link rel="stylesheet" href="../../css/login_form.css">
	
</head>

<body>
	<?php include'../header.php'; ?>
	<div class="container">
		<h1><span>Admin login</span></h1>
		<form action="../../php/admin/admin_login.php" method="post" id="myForm">
			<div class="form-group">
				<label for="email" id="email_title">Email:</label>
				<span class="error" id="email_error"></span>
				<input type="email" class="form-control" id="email" placeholder="Enter email" value ="<?php echo $error['email']; ?>" name="user[email]">

			</div>
			<div class="form-group">
				<label for="pwd" id="password_title">Password:</label>
				<input type="password" class="form-control" id="password" value ="<?php echo $error['password']; ?>" placeholder="Enter password"
					name="user[password]">
			</div>
			<div class="checkbox">
				<label> <input type="checkbox"
						onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show
					password</input></label>
			</div>


			<div class='row'>
				<div class='col-lg-6'>
					<button type="submit" class="btn btn-success btn-block" id="submit">Submit</button>
				</div>
				<!-- <div class='col-lg-6'>
					<a href="../../index.php"><button type="button" class="btn btn-primary btn-block" id="redirect">Home</button>
					</a>
				</div> -->
			</div>
			<div class = 'error'>
				<?php echo $error['invalid']; ?>
			</div>
			<br>	

		</form>
	</div>
	<?php include'../footer.php'; ?>

</body>

</html>