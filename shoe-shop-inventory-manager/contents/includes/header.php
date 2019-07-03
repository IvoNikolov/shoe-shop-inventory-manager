<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>
        <link  rel="stylesheet" href="../../css/bootstrap.min.css"/>
        <link href="../../js/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="../../css/sb-admin-2.css" rel="stylesheet">
        <link href="../../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script defer src="../../fonts/font-awesome/js/all.js"></script>
        <script src="../../js/jquery.min.js" type="text/javascript"></script> 

    </head>
    <body>
    	<div id="wrapper">
    	<?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ) : ?>
    		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; position: fixed;width:100%">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Shoe Shop Inventory Manager</a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fas fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['user_id'] ?></a>
                                <li><a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i> Exit</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li >
                                    <a href="../pages/main.php"><i class="fas fa-chart-line"></i> Index </a>
                                </li>
								<li <?php echo (CURRENT_PAGE =="brand.php" || CURRENT_PAGE =="add_data.php?operation=create&table=test_table") ? 'class="active"' : '' ;?>>
                                    <a href="#"><i class="fas fa-circle"></i> Brand</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="../pages/brand.php"><i class="fa fa-list fa-fw"></i> Brands</a>
                                        </li>
	                                    <li>
	                                        <a href="../operations/add_data.php?operation=create&table=brand"><i class="fa fa-plus fa-fw"></i> Add Brand</a>
	                                    </li>
                                    </ul>
                                </li>
                                 <li <?php echo (CURRENT_PAGE =="merchandise.php" || CURRENT_PAGE =="add_data.php?operation=create&table=merchandise") ? 'class="active"' : '' ;?>>
                                    <a href="#"><i class="fa fa-boxes fa-fw"></i> Merchandise</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="../pages/merchandise.php"><i class="fa fa-list fa-fw"></i> Merchandise on Stock</a>
                                        </li>
	                                    <li>
	                                        <a href="../operations/add_data.php?operation=create&table=merchandise"><i class="fa fa-plus fa-fw"></i> Add Merchadise</a>
	                                    </li>
                                    </ul>
                                </li>
                                <li <?php echo (CURRENT_PAGE =="shop.php" || CURRENT_PAGE =="add_data.php?operation=create&table=shop") ? 'class="active"' : '' ;?>>
                                    <a href="#"><i class="fas fa-home"></i> Shop</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="../pages/shop.php"><i class="fa fa-list fa-fw"></i> Shop</a>
                                        </li>
	                                    <li>
	                                        <a href="../operations/add_data.php?operation=create&table=shop"><i class="fa fa-plus fa-fw"></i> Add Shop</a>
	                                    </li>
                                    </ul>
                                </li>
                                 <li <?php echo (CURRENT_PAGE =="origin.php" || CURRENT_PAGE =="add_data.php?operation=create&table=origin") ? 'class="active"' : '' ;?>>
                                    <a href="#"><i class="fa fa-map-signs"></i> Origin</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="../pages/origin.php"><i class="fa fa-list fa-fw"></i> Origin</a>
                                        </li>
	                                    <li>
	                                        <a href="../operations/add_data.php?operation=create&table=origin"><i class="fa fa-plus fa-fw"></i> Add Origin</a>
	                                    </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="../pages/sales.php"><i class="fas fa-piggy-bank"></i> Sales</a>
                                </li>
                                <li>
                                    <a href="../pages/log.php"><i class="fas fa-info-circle"></i> Log</a>
                                </li>
                                <li>
                                    <a href="../admin/users.php"><i class="fa fa-users"></i> Users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
             	</nav>
             <?php endif; ?>