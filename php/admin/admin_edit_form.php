<?php
include '../../php/database.php';
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../../forms/admin_form.php");
}

		$conn =  $db->return_conn();
		$id = $_REQUEST['id'];
		//$query = " SELECT name,mob_no  from user where id= '".$id."' ";
		$query = mysqli_query($conn," SELECT name,mob_no,email  from user where id= '".$id."' ");
		//print_r($query);exit;
		$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">var user_id = "<?php echo $id; ?>";
	// alert(id);
	</script>
	<script src="../../js/edit_form.js"></script>
	<link rel="stylesheet" href="../../css/edit_form.css">
</head>

<body>
	<div class="container">
		<div id="profile">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['email_user']; ?></i></b>
            <!-- <b id="logout"><a href="logout.php"><>Log Out</a></b> -->
            <a href="../../php/admin/admin_logout.php">
                <span id="logout" class="glyphicon glyphicon-log-out"></span>
            </a>
        </div>
		<hr>
		<form action="../../php/admin/admin_edit.php?id=<?php echo $id;?>" method="post" id="myForm">
			<div class="form-group">
				<label for="name" id="name_title">Name:</label>
				<span class="error" id="name_error">*</span>
				<input type="name" class="form-control" id="name" placeholder="Enter name" name="user[name]"
					value="<?php echo $row['name']; ?>">

			</div>
			<div class="form-group">
				<label for="mob_no" id="mob_no_title">Mobile number:</label>
				<span class="error" id='mob_no_error'>*</span>				
				<input type="text" class="form-control" id="mob_no" onkeypress="return restrictAlphabets(event)"
					maxlength="10" value="<?php echo $row['mob_no']; ?>" placeholder="Enter mobile no"
					name="user[mob_no]">
			</div>
			<div class="form-group">
				
				<label for="email" id="email_title">email:</label><span class='abc' id='abc'></span>
				<span class="error" id='email_error'></span>
				<input type="name" class="form-control" id="email" placeholder="Enter email" name="user[email]"
					value="<?php echo $row['email']; ?>">
			</div>
			<div class="row">
				<div class="col-lg-4">
					<button class="btn btn-success" type="submit" id="submit" name="submit">Update </button>
				</div>
			</div>


		</form>
	</div>
</body>

</html>

