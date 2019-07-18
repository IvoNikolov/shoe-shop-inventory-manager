<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

    if (isset($_POST['import'])) {
    	echo "Import";
    }
    
    if (isset($_POST['export'])) { 
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
    <form class="form" action="" method="post"  id="archive_form" enctype="multipart/form-data">
    <fieldset>
    <div class="form-group">
    <div class="row">
        <div class="col-lg-6">
        	<div class="form-group">
            	<button class="btn btn-info" type="submit" name="import" value="import"> Import</button>
            	<button class="btn btn-danger" type="submit" name="export" value="export"> Export</button>
            </div>
        </div>
    </div>
    </div>
     </fieldset>
     </form>
</div>

<?php include_once('../includes/footer.php'); ?>