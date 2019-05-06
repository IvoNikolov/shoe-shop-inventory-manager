<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$data_id = filter_input(INPUT_GET, 'data_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING);
$table_name = filter_input(INPUT_GET, 'table',FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $id = filter_input(INPUT_GET, 'data_id', FILTER_SANITIZE_STRING);
    $data_to_update = filter_input_array(INPUT_POST);
    $data_to_update['date_modified'] = date('Y-m-d H:i:s');
	$data_to_log['user_id'] = $_SESSION['user_id'];
    $db->where('id',$id);
    
    $data_to_log['data_log'] = "edit_".$table_name;
	$data_to_log['date_added'] = date('Y-m-d H:i:s');
	$data_to_log['user_id'] = $_SESSION['user_id'];
    $last_id = $db->update($table_name, $data_to_update);
    $last_log = $db->update('log', $data_to_log);
    
    if($last_id)
    {
    	header('location:../pages/' . $table_name .'.php');
    	exit();
    }  
}

if($edit)
{
    $db->where('id', $data_id);
    $data = $db->getOne($table_name);
}

$brands = $db->get("brand");

require_once '../includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add <?php echo $table_name ?></h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="data_form" enctype="multipart/form-data">
       <?php  include_once('../form/'. $table_name .'_form.php'); ?>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>