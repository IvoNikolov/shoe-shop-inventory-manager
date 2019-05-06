<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

$db = getDbInstance();

$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

$page = filter_input(INPUT_GET, 'page');

$pagelimit = 20;
$counter = 0;

if (!$page) {
    $page = 1;
}

if (!$filter_col) {
    $filter_col = "id";
}
if (!$order_by) {
    $order_by = "Asc";
}

$db = getDbInstance();
$select = array('id', 'brand_name', 'brand_index', 'origin','date_added', 'date_modified');
$real_names = array('id' => '#',
					'brand_name' => 'Name',
					'brand_index' => 'Index',
					'origin' => 'Origin',
					'date_added' => 'Date Added',
					'date_modified' => 'Date Modified');

if ($search_string) 
{
    $db->where('id', $search_string, '=');
}

if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}

$db->pageLimit = $pagelimit;

$customers = $db->arraybuilder()->paginate("brand", $page, $select);
$total_pages = $db->totalPages;


foreach ($customers as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    break;
}

include_once '../includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Brand</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
	            <a href="../operations/add_data.php?operation=create&table=brand">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add brand</button>
	            </a>
            </div>
        </div>
    </div>
    <?php include('../includes/flash_messages.php') ?>
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search"> Search:</label>
            <input type="text" class="form-control" id="input_search" name="search_string" value="<?php echo $search_string; ?>">
            <label for ="input_order"> Arrange by: </label>
            <select name="filter_col" class="form-control">

                <?php
                foreach ($filter_options as $option) {
                    ($filter_col === $option) ? $selected = "selected" : $selected = "";
                    echo ' <option value="' . $option . '" ' . $selected . '>' . $real_names[$option] . '</option>';
                }
                ?>

            </select>

            <select name="order_by" class="form-control" id="input_order">

                <option value="Asc" <?php
                if ($order_by == 'Asc') {
                    echo "selected";
                }
                ?> >Assending</option>
                <option value="Desc" <?php
                if ($order_by == 'Desc') {
                    echo "selected";
                }
                ?>>Decending</option>
            </select>
            <input type="submit" value="search" class="btn btn-primary">

        </form>
    </div>
<!--   Filter section end-->

    <hr>

<table>
	<tr>
		<td width="1000px">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
        				<th>Name</th>
        				<th>Index</th>
        				<th>Origin</th>
        				<th>Date Added</th>
        				<th>Date Modified</th>
        				<th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $row):?>
                        <tr>
                        	<td><?php echo $row['id'] ?></td>
        					<td><?php echo htmlspecialchars($row['brand_name']) ?></td>
        					<td><?php echo htmlspecialchars($row['brand_index']) ?></td>
        					<td><?php echo htmlspecialchars($row['origin']) ?></td>
        					<td><?php echo htmlspecialchars($row['date_added']) ?></td>
        					<td><?php echo htmlspecialchars($row['date_modified']) ?></td>
        	                <td>
        					<a href="../operations/edit_data.php?data_id=<?php echo $row['id'] ?>&operation=edit&table=brand" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>
        
        					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
        				</tr>
        
        						<!-- Delete Confirmation Modal-->
        					 <div class="modal fade" id="confirm-delete-<?php echo $row['id'] ?>" role="dialog">
        					    <div class="modal-dialog">
        					      <form action="../operations/delete_data.php" method="POST">
        					      <!-- Modal content-->
        						      <div class="modal-content">
        						        <div class="modal-header">
        						          <button type="button" class="close" data-dismiss="modal">&times;</button>
        						          <h4 class="modal-title">Confirm</h4>
        						        </div>
        						        <div class="modal-body">
        						      
        						        		<input type="hidden" name="del_id" id ="del_id" value="<?php echo $row['id'] ?>">
        						        		<input type="hidden" name="del_table" id ="del_table" value="brand">
        						        	
        						          <p>Are you sure you want to delete item?</p>
        						        </div>
        						        <div class="modal-footer">
        						        	<button type="submit" class="btn btn-default pull-left">Yes</button>
        						         	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        						        </div>
        						      </div>
        					      </form>
        					      
        					    </div>
          					</div>
                    <?php endforeach; ?>      
                </tbody>
            </table>
		</td>
	</tr>
</table>

   
<!--    Pagination links-->
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if previously built by http_build_query function
            unset($_GET['page']);
            //to keep the query sting parameters intact while navigating to next/prev page,
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="brand.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->

<?php include_once('../includes/footer.php'); ?>