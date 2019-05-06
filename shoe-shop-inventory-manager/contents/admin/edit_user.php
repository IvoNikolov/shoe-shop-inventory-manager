<?php
session_start();
require_once '../../config/config.php';

$user_id=  filter_input(INPUT_GET, 'user_id');
 $db = getDbInstance();
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $data_to_update = filter_input_array(INPUT_POST);
    $user_id=  filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);
    $data_to_update['password']=md5($data_to_update['password']);
    
    $db->where('id',$user_id);
    $stat = $db->update('users', $data_to_update);
    
    $data_to_log['data_log'] = "edit_user";
	$data_to_log['date_added'] = date('Y-m-d H:i:s');
	$data_to_log['user_id'] = $_SESSION['user_id'];
    $log_id = $db->insert ('log', $data_to_log);
    
    if($stat)
    {
        $_SESSION['success'] = "User successfully added.";
    }
    else
    {
        $_SESSION['failure'] = "User creation failed.";
    }

    header('location: users.php');
    
}
$role_default = "";

$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
$db->where('id', $user_id);

$admin_account = $db->getOne("users");

$db = getDbInstance();
$roles = $db->get("user_roles");

require_once '../includes/header.php';
?>

<div id="page-wrapper">
	<div class="row">
	     <div class="col-lg-12">
	        <h2 class="page-header">Add user</h2>
	     </div>  
	</div>
    <form class="well form-horizontal" action=" " method="post"  id="user_form" enctype="multipart/form-data">
       <?php  include_once('../form/user_form.php'); ?>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>