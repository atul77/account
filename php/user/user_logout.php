<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../../forms/user_form.php"); // Redirecting To Home Page
}
?>