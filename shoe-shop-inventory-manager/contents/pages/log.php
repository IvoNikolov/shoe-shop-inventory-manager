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
$select = array('id', 'data_log', 'date_added', 'user_id');
$real_names = array('id' => '#',
					'data_log' => 'Logged Data',
					'date_added' => 'Date Added',
					'user_id' => 'User');

if ($search_string) 
{
    $db->where('id', $search_string, '=');
}

if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}

$db->pageLimit = $pagelimit;

$customers = $db->arraybuilder()->paginate("log", $page, $select);
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
    <div class="row" style="padding-top:30px;">
        <div class="col-lg-6">
            <h1 class="page-header">Log</h1>
        </div>
    </div>
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
        				<th>Log</th>
        				<th>Log Added</th>
        				<th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $row):?>
                        <tr>
                        	<td><?php echo $row['id'] ?></td>
        					<td><?php echo htmlspecialchars($row['data_log']) ?></td>
        					<td><?php echo htmlspecialchars($row['date_added']) ?></td>
        					<td><?php echo htmlspecialchars($row['user_id']) ?></td>
        				</tr>
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
                echo '<li' . $li_class . '><a href="log.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->

<?php include_once('../includes/footer.php'); ?>