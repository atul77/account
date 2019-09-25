<?php
//include('session.php');
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../../forms/admin_form.php");
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
    <link rel="stylesheet" href="../../css/delete_form.css">
</head>

<body>
    <div class="container">
        <div id="profile">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['email_user']; ?></i></b>
            <a href="../../php/admin/admin_logout.php">
                <span id="logout" class="glyphicon glyphicon-log-out"></span>
            </a>
        </div>
        <hr>
        <div>
            <?php
                include '../../php/database.php';
                $conn =  $db->return_conn();
                $id = $_REQUEST['id'];
                $query = mysqli_query($conn,"SELECT * FROM user where id = '$id'");
                $row = mysqli_fetch_assoc($query);
                $name = $row['name'];
                $mob_no = $row['mob_no'];
                $email = $row['email'];
            ?>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>mobile no</th>
                    <th>Email</th>
                </tr>

                <tr>
                    <td> <?php echo $id ?> </td>
                    <td><?php echo $name ?> </td>
                    <td><?php echo $mob_no ?> </td>
                    <td> <?php echo $email ?></td>
                </tr>
            </table>
            <div>
                <a href="../../php/admin/admin_delete.php?id= <?php echo $id; ?>"><button type="submit"
                        class="btn btn-success" id="submit">delete user</button></a>
            </div>
        </div>
    </div>
</body>

</html>