<?php
session_start(); 
require_once '../../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'passwd');
    $remember = filter_input(INPUT_POST, 'remember');
    $passwd=  md5($passwd);
   	
    //Get DB instance. function is defined in config.php
    $db = getDbInstance();

    $db->where ("user_id", $username);
    $db->where ("password", $passwd);
    $row = $db->get('users');
     
    if ($db->count >= 1) {
        $_SESSION['user_logged_in'] = TRUE;
        $_SESSION['admin_type'] = $row[0]['role'];
		$_SESSION['user_id'] = $row[0]['user_id'];
       	if($remember)
       	{
       		setcookie('username',$username , time() + (86400 * 90), "/");
       		setcookie('password',$passwd , time() + (86400 * 90), "/");
       	}
        header('Location: ../../index.php');
        exit;
    } else {
        $_SESSION['login_failure'] = "Invalid!";
        header('Location:../login/login.php');
        exit;
    }
}

?>