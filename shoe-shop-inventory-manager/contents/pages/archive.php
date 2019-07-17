<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

	if (isset($_POST['import'])) {
    	echo "Import";
    }
    elseif (isset($_POST['export'])) {
    	echo "Export";
    }

include_once '../includes/header.php';
?>

<div id="page-wrapper">
    <div class="row" style="padding-top:30px;">
        <div class="col-lg-6">
            <h1 class="page-header">Archive</h1>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <button class="btn btn-info" type="submit" name="import" value="Import"> Import</button>
            <button class="btn btn-danger" type="submit" name="export" value="Export"> Export</button>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>