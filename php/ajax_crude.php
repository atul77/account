<?php 
include '../php/database.php';
$conn =  $db->return_conn();
$id = $_REQUEST['crude'];
$table_name= 'user';
$column_name1='id';
$all_column='*';

$query ="SELECT $all_column FROM $table_name where $column_name1 = '$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
// echo $row["id"] ;
// echo $row["name"] ;
// echo $row["mob_no"]; 
// echo $row["email"] ;
$x= base64_encode(json_encode($row));
echo $x;
?> 		