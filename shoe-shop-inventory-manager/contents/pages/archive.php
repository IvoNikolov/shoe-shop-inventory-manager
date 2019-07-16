<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');
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
            <button class="btn btn-info"> Import</button>
            <button class="btn btn-danger"> Export</button>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>