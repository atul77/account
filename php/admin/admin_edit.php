<?php
include '../../php/database.php';
session_start();
if(!isset($_SESSION['email_user'])){
header("location: ../../forms/admin_form.php");

        
}
// $conn =  $db->return_conn();
$id = $_REQUEST['id'];
if(isset($_POST)){
    $table_name ='user';
    $column_name1 ='name';
    $column_name2 ='mob_no';
    $column_name3 ='email';
    $column_name4 ='id';
    $db->update_table($table_name,$column_name1,$column_name2,$column_name3,$column_name4,$_REQUEST['user']['name'],$_REQUEST['user']['mob_no'],$_REQUEST['user']['email'], $id);
    $script =  "<script> $(document).ready(function(){ $('#update_modal').modal('show'); }); </script>";
    

}

?>


<!-- modal for success -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="update_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">success</h4>
            </div>
            <div class="modal-body">
                <p>successfully user updated.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="../../php/admin/admin_welcome.php" class="btn btn-success">back</a>
            </div>
        </div>

    </div>
</div>


<?php 
//if(isset($script)){ echo $script; } 
header("location: ../../php/admin/admin_welcome.php?success=Record updated successfully");
?>