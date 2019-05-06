<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');
include_once '../includes/header.php';
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Sales</h1>
        </div>
    </div>
    <span style="color:red">*Shops are yet to be open!</span>
</div>


<?php include_once('../includes/footer.php'); ?>