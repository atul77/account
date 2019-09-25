<?php
include '../../php/database.php';
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../forms/admin_form.php");
}
// $conn =  $db->return_conn();
$id = $_REQUEST['id'];
$table_name='user';
$column_name1='status';
$column_name2='id';
$column_value1='inactive';

$db->delete_user($table_name,$column_name1,$column_name2,$column_value1,$id);
header("location: ../../php/admin/admin_welcome.php?success=user deleted successfully");
?>