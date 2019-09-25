<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../forms/login_form.php"); // Redirecting To Home Page
}
?>