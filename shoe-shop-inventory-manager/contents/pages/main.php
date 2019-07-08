<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$db = getDbInstance();

$numBrand = $db->getValue ("brand", "count(*)");
$numUsers = $db->getValue ("users", "count(*)");
$numShop = $db->getValue ("shop", "count(*)");
$numMerchandise = $db->getValue ("merchandise", "count(*)");
$numOrigin = $db->getValue ("origin", "count(*)");

include_once('../includes/header.php');

?>

<div id="page-wrapper">
    <div class="row" style="padding-top:30px;">
        <div class="col-lg-12">
            <h1 class="page-header">Navigation</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numBrand; ?></div>
                            <div>Brands</div>
                        </div>
                    </div>
                </div>
                <a href="brand.php">
                    <div class="panel-footer">
                        <span class="pull-left">Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-home fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numShop; ?></div>
                            <div>Shops</div>
                        </div>
                    </div>
                </div>
                <a href="shop.php">
                    <div class="panel-footer">
                        <span class="pull-left">Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-box fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numMerchandise; ?></div>
                            <div>Mechandise</div>
                        </div>
                    </div>
                </div>
                <a href="merchandise.php">
                    <div class="panel-footer">
                        <span class="pull-left">Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
		<div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-map-signs fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numOrigin; ?></div>
                            <div>Origins</div>
                        </div>
                    </div>
                </div>
                <a href="origin.php">
                    <div class="panel-footer">
                        <span class="pull-left">Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		  <div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fas fa-info-circle fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $numLog; ?></div>
							<div>Log</div>
						</div>
					</div>
				</div>
				<a href="brand.php">
					<div class="panel-footer">
						<span class="pull-left">Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
        </div>
      <?php if($_SESSION['admin_type'] == 1){ ?>
		<div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numUsers; ?></div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="../admin/users.php">
                    <div class="panel-footer">
                        <span class="pull-left">Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
	  <?php } ?>
<div class="col-lg-8">
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>