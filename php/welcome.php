<?php
//include('session.php');
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../forms/login_form.php");
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
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
    <div class="container">
        <div id="profile">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['email_user']; ?></i></b>
            <!-- <b id="logout"><a href="logout.php"><>Log Out</a></b> -->
            <a href="../php/logout.php">
                <span id="logout" class="glyphicon glyphicon-log-out"></span>
            </a>
        </div>
        <hr>
        <div class="error">
        <?php echo $_GET['success']; ?>
        </div>
        <div>
        <table class="table table-striped table-condensed table-bordered">
        <tr>
        <th>id</th>
        <th>Name</th>
        <th>mobile no</th>
        <th>Email</th>
        <th>password</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php
        include '../php/database.php';
        $conn =  $db->return_conn();
        $query = mysqli_query($conn,"SELECT * FROM user where status ='active'");
        $row = mysqli_fetch_assoc($query);
        while($row = mysqli_fetch_assoc($query)){
    

        ?>    
            <tr>
            <td><?php echo $row["id"] ?> </td>
            <td><?php echo $row["name"] ?> </td>
            <td> <?php echo $row["mob_no"] ?></td>
            <td> <?php echo $row["email"] ?> </td>
            <td> <?php echo $row["password"] ?></td>
            <td><a href="../php/edit_form.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
            <td><a href="../php/delete_form.php?id=<?php echo $row["id"]; ?>" >Delete</a></td>
            </tr>
            <?php
        }
        ?>
        
        </table>
    </div>
    </div>
</body>

</html>