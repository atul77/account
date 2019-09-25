<?php
include '../php/database.php';
session_start();
if(isset($_SESSION['email_user'])){
    header("location: ../php/welcome.php");

}
else{
    $_REQUEST['user']['password']=md5($_REQUEST['user']['password']);
    $table_name = 'user';    
    $column_name = implode(",", array_keys($_REQUEST['user'])) ;
    $column_value = "'" . implode("','", array_values($_REQUEST['user'])) . "'";
    echo"<pre>";
    // print_r($column_name);
    // print_r($column_value);
    echo"</pre>";
    $result = $db->login_access($_REQUEST['user']['email'],$_REQUEST['user']['password']);
    //print_r($result);
    if($result != 0){
        //$script =  "<script> $(document).ready(function(){ $('#login_modal').modal('show'); }); </script>";
        $_SESSION['email_user'] = $_REQUEST['user']['email']; // Initializing Session
        header("location: ../php/welcome.php");
    }
    else if ($result == 0){
        //header("location: ../login_form.php");
        $script =  "<script> $(document).ready(function(){ $('#loginerr_modal').modal('show'); }); </script>";
        
       
    }
    
}

?>
<!-- modal for success -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Modal -->
<!-- //successfell login modal -->
<div class="modal fade" id="login_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">success</h4>
            </div>
            <div class="modal-body">
                <p>successfully logged in.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="../forms/login_form.php" class="btn btn-success">login</a>
            </div>
        </div>

    </div>
</div>

<!-- //unsuccessfull login modal -->
<div class="modal fade" id="loginerr_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">success</h4>
            </div>
            <div class="modal-body">
                <p>Invalid email or password.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="../forms/login_form.php" class="btn btn-success">login</a>
            </div>
        </div>

    </div>
</div>

<?php if(isset($script)){ echo $script; } ?>