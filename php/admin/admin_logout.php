<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../../forms/admin_form.php"); // Redirecting To Home Page
}
?>