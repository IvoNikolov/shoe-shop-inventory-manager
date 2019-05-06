<?php 
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$del_id = filter_input(INPUT_POST, 'del_id');
$del_table = filter_input(INPUT_POST, 'del_table');

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $data_id = $del_id;
    $db = getDbInstance();
    $db->where('id', $del_id);
    $status = $db->delete($del_table);
    
    $data_to_update['data_log'] = "delete_".$del_table;
	$data_to_update['date_added'] = date('Y-m-d H:i:s');
	$data_to_update['user_id'] = $_SESSION['user_id'];
    $log_id = $db->insert ('log', $data_to_update);
    
    header('location: ../pages/' . $del_table .'.php');
}

?>