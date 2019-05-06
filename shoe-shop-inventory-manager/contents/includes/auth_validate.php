<?php
if (!isset($_SESSION['user_logged_in']) || !isset($_SESSION['user_id'])) {
	header('Location:../login/login.php');
}
?>