<?php
include '../php/database.php';
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../forms/login_form.php");
}
else{
       
}

?>