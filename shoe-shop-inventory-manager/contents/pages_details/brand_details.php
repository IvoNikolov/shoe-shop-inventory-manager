<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$brand_id=filter_input(INPUT_GET, 'data_id');

$db = getDbInstance();
$brands = $db->get("brand");


$db->where('brand', $brand_id);
$items = $db->get("merchandise");

$db->where('brand', $brand_id);
$total_price = $db->getOne ("merchandise", "sum(price)");
$items_number=count($items);

foreach($brands as $key=>$value){	
	if($value['id'] == $brand_id){
		$brand_name = $value['brand_name'];
	}
}

include_once '../includes/header.php';
?>
<div id="page-wrapper">
 	<div class="row" style="padding-top:30px;">
        <div class="col-lg-6">
            <h2 class="page-header">Available merchandise for brand: <?php echo $brand_name;?></h2>
        </div>
    </div>
    <div class="row">
		<div class="container">
			<div class="col-lg-4">   
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Total number of items:</th>
			        <th>Total price:</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?php echo $items_number;?></td>
			        <td><?php echo $total_price["sum(price)"];?></td>
			      </tr>
			    </tbody>
			  </table>
			</div>
	 	</div>
	 </div>
</div>

<?php include_once('../includes/footer.php'); ?>