<?php
session_start();
require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$data_to_store = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    $data_to_store['password'] = md5($data_to_store['password']);
    $last_id = $db->insert('users', $data_to_store);
	//var_dump($last_id);
	
    $data_to_log['data_log'] = "add_user";
	$data_to_log['date_added'] = date('Y-m-d H:i:s');
	$data_to_log['user_id'] = $_SESSION['user_id'];
    $log_id = $db->insert ('log', $data_to_log);
    
    if($last_id)
    {
    	//$_SESSION['success'] = "Successfully added user!";
    	header('location: users.php');
    	exit();
    }  
    
}

$edit = false;
$role_default = "checked";

$db = getDbInstance();
$roles = $db->get("user_roles");

require_once '../includes/header.php';
?>

<div id="page-wrapper">
	<div class="row" style="padding-top:30px;">
	     <div class="col-lg-12">
	        <h2 class="page-header">Add user</h2>
	     </div>  
	</div>
    <form class="well form-horizontal" action=" " method="post"  id="user_form" enctype="multipart/form-data">
       <?php  include_once('../form/user_form.php'); ?>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>