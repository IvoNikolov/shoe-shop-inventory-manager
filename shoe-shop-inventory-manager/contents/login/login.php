<?php
session_start();
require_once '../../config/config.php';

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
    header('Location:../pages/main.php');
}


if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	$db = getDbInstance();
	$username = filter_var($_COOKIE['username']);
	$passwd = filter_var($_COOKIE['password']);
	$db->where ("user_id", $username);
	$db->where ("password", $passwd);
    $row = $db->get('users');

    if ($db->count >= 1) 
    {
        $_SESSION['user_logged_in'] = TRUE;
        $_SESSION['admin_type'] = $row[0]['role'];
		$_SESSION['user_id'] = $row[0]['username'];
        header('Location: ../pages/main.php');
        exit;
    }
    else 
    {
	    unset($_COOKIE['username']);
	    unset($_COOKIE['password']);
	    setcookie('username', null, -1, '/');
	    setcookie('password', null, -1, '/');
	    header('Location:../pages/main.php');
	    exit;
    }
}

include_once '../includes/header.php';
?>
<div id="page-" class="col-md-4 col-md-offset-4">
	<form class="form loginform" method="POST" action="authentication.php">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Please login</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">User</label>
					<input type="text" name="username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" name="passwd" class="form-control" required="required">
				</div>
				<div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="1">Remember me
					</label>
				</div>
				<button type="submit" class="btn btn-success loginField" >Enter</button>
			</div>
		</div>
	</form>
</div>
<?php include_once '../includes/footer.php'; ?>