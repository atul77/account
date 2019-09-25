<?php
//include('session.php');
//include '../../php/database.php';

session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../../forms/admin_form.php");
}

// $table_name='user';
//         $all_column='*';
//         $column_name1='type';
//         $column_value1='user';
// $row = $db->select_all($table_name,$all_column,$column_name1,$column_value1);
//         print_r($row);exit;
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
            <a href="../../php/admin/admin_logout.php">
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
                    <th>status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
        include '../../php/database.php';
        $table_name= 'user';
        $column_name1='type';
        $column_value1='user';
        $all_column='*';
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $limit = 5;
        $offset = ($pageno-1) * $limit;
        $conn = $db->return_conn();
        //total count
        $total_pages_sql = "SELECT COUNT(*) FROM $table_name";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $limit);
        
        //record according to offset and limit
        $query = "SELECT $all_column FROM $table_name where $column_name1='$column_value1' LIMIT $offset,$limit";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
        ?>
                <tr>
                    <td><?php echo $row["id"] ?> </td>
                    <td><?php echo $row["name"] ?> </td>
                    <td> <?php echo $row["mob_no"] ?></td>
                    <td> <?php echo $row["email"] ?> </td>
                    <td><a href="../../php/admin/admin_active_form.php?id=<?php echo $row["id"]; ?>">
                            <?php echo $row["status"] ?></a></td>
                    <td><a href="../../php/admin/admin_edit_form.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                    <td><a href="../../php/admin/admin_delete_form.php?id=<?php echo $row["id"]; ?>">delete</a></td>
                </tr>
                <?php
        }
        ?>

            </table>
        </div>
        <div>
            <ul class="pagination pagination-lg">
                <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&laquo;</a>
                </li>
                <li class="page-item ">
                    <a class="page-link" href="?pageno=1">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?pageno=2">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?pageno=3">3</a>
                </li>
                <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno >= $total_pages-$limit){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>