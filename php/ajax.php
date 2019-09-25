<?php 

include '../php/database.php';
// $connection = new Connection();
$emailId=$_POST['user_email'];
$id = $_REQUEST['id'];
//$db-> num_rows($emailId);

$table_name = 'user';
$column_name1 = 'email';
$column_name2 = 'id';
$column_value2 = $id;
$result = $db->num_rows($table_name,$column_name1,$column_name2,$emailId,$column_value2);
echo $result;
?> 		