<?php
include '../php/database.php';

//if submit is set
if (isset($_REQUEST['submit'])) {
    include '../php/Validation.php';
    $valid = new validation();
    $valid_response = $valid->validate();
    $table_name = 'user';    
    $column_name = 'email';
    $result = $db->num_rows1($table_name,$column_name,$_REQUEST['user']['email']);
    if ($result == '0' && $valid_response == '0') {
        //md5 password
        $_REQUEST['user']['password']=md5($_REQUEST['user']['password']);
        $table_name = 'user';    
        $column_name = implode(",", array_keys($_REQUEST['user'])) ;
        $column_value = "'" . implode("','", array_values($_REQUEST['user'])) . "'";
        //calling insert function  
        $last_id = $db->insert($table_name, $column_name, $column_value);
        if($last_id > 0){
            $script =  "<script> $(document).ready(function(){ $('#signup_modal').modal('show'); }); </script>";
        }    
    } 
    else{
        if($result != '0' && $valid_response == '0'){
            $email_exists = array(email_exists=>"email already exists");
            $php_email1 = array_merge($email_exists,$_POST['user']);
            $php_email = base64_encode(json_encode($php_email1));
            header("location: ../forms/signup_form.php?exists_email=$php_email");
        }
        else if($result == '0' && $valid_response != '0'){
            $php_error1 = array_merge($valid_response,$_POST['user']);
            $php_error = base64_encode(json_encode($php_error1));
            header("location: ../forms/signup_form.php?success=$php_error");    
        }
        
    }   
}   
?>

<!-- modal for success -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="signup_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">success</h4>
            </div>
            <div class="modal-body">
                <p>successfully user created.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="../../forms/user_form.php" class="btn btn-success">login</a>
            </div>
        </div>

    </div>
</div>

<?php if(isset($script)){ echo $script; } ?>