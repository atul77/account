<?php
include '../../php/database.php';
session_start();
if(isset($_SESSION['email_user'])){
    header("location: ../../php/welcome.php");

}
else{
    $_REQUEST['user']['password']=md5($_REQUEST['user']['password']);
    // $column_name = implode(",", array_keys($_REQUEST['user'])) ;
    // $column_value = "'" . implode("','", array_values($_REQUEST['user'])) . "'";
    $table_name = 'user';  
    $column_name1 = 'email';  
    $column_name2 = 'password'; 
    $column_name3 = 'type'; 
    $column_value3 = 'admin'; 
    $result = $db->login_access($table_name,$column_name1,$column_name2,$column_name3,$_REQUEST['user']['email'],$_REQUEST['user']['password'],$column_value3);
    if($result != 0){
        //$script =  "<script> $(document).ready(function(){ $('#login_modal').modal('show'); }); </script>";
        $_SESSION['email_user'] = $_REQUEST['user']['email']; // Initializing Session
        header("location: ../../php/admin/admin_welcome.php");
    }
    else if ($result == 0){
        $invalid_data = array(invalid=>'Invalid email or password');
        $data = array_merge($invalid_data,$_POST['user']);
        $php_error = base64_encode(json_encode($data));
        header("location: ../../forms/admin_form.php?invalid=$php_error");
        // $script =  "<script> $(document).ready(function(){ $('#loginerr_modal').modal('show'); }); </script>";
        
       
    }
    
}

?>