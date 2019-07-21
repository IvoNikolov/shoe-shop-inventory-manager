<?php
session_start();
require_once '../../config/config.php';
include_once('../includes/auth_validate.php');

    if (isset($_POST['import'])) {
    	echo "Import";
    }
    
    if (isset($_POST['export'])) { 
		 $DB_HOST=DB_HOST;
    $DB_USER=DB_USER;
    $DB_PASS=DB_PASSWORD;
    $DB_NAME=DB_NAME;
    
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    $conn->set_charset("utf8");
    
    $tables = array();
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    
    $sqlScript = "";
    foreach ($tables as $table) {
        
        $query = "SHOW CREATE TABLE $table";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);
        
        $columnCount = mysqli_num_fields($result);
        for ($i = 0; $i < $columnCount; $i ++) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j ++) {
                    $row[$j] = $row[$j];
                    
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }
        
        $sqlScript .= "\n";
    }
    
    if(!empty($sqlScript))
    {        
        $backup_file_name = $DB_NAME . '_backup_' . $timenow . '.sql';
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);
        copy($backup_file_name,'backup/'.$backup_file_name);
        unlink($backup_file_name);

        echo '<script language="javascript">';
        echo 'alert("Database '.$backup_file_name.' is saved successfully!")';
        echo '</script>';
        header("Refresh:0");
    }   
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
	<div class="row">
    		<div class="col-lg-4">
			    <div class="form-group">
			        <label>Available Databases</label>
			            <select name="database" id="database" class="form-control selectpicker" >
			                <?php
			                foreach ($fileList as $value) {
			                    $sel = "selected";
			                    echo '<option value="'.$value.'"' . $sel . '>' . $value . '</option>';
			                }
			    
			                ?>
			            </select>
    			</div>
    		</div>
    	</div>
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

<script type="text/javascript">
$(document).ready(function(){

	$("#archive_form").validate({
		rules:{
		  database: {
          	required: true,
            minlength: 1
		  }
		},
		  messages: {
			database: "Choose database!"
		}
	});
	
});
</script>

<?php include_once('../includes/footer.php'); ?>