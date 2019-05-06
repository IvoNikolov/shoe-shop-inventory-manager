<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$table_name = filter_input(INPUT_GET, 'table',FILTER_SANITIZE_STRING); 
$db = getDbInstance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	
	$data_to_store = filter_input_array(INPUT_POST);
	date_default_timezone_get();
	$data_to_store['date_added'] = date('Y-m-d H:i:s');
	$data_to_store['date_modified'] = date('Y-m-d H:i:s');
	
	$data_to_log['data_log'] = "add_".$table_name;
	$data_to_log['date_added'] = date('Y-m-d H:i:s');
	$data_to_log['user_id'] = $_SESSION['user_id'];
    $last_id = $db->insert ($table_name, $data_to_store);
    $log_id = $db->insert ('log', $data_to_log);
    
	if($last_id)
    {
		$_SESSION['success'] = "Successfully added!";
        header('location: ../pages/' . $table_name .'.php');
    	exit();
    }
}

$brands = $db->get("brand");
$origins = $db->get("origin");
$edit = false;

require_once '../includes/header.php'; 
?>
<div id="page-wrapper">

	<div class="row">
	     <div class="col-lg-12">
            <h2 class="page-header">Add <?php echo $table_name ?></h2>
        </div>
	</div>
	<?php include('../includes/flash_messages.php') ?>
    <form class="form" action="" method="post"  id="data_form" enctype="multipart/form-data">
       <?php  include_once('../form/'. $table_name .'_form.php'); ?>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>