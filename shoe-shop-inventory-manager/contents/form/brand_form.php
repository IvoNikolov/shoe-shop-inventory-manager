<fieldset>	
	<div class="form-group">
        <label for="brand_name">Brand Name</label>
        <input type="text" name="brand_name" value="<?php echo $edit ? $data['brand_name'] : ''; ?>" placeholder="Brand Name" class="form-control" id="brand_name">
    </div> 

	<div class="form-group">
        <label for="brand_index">Brand Index</label>
        <input type="text" name="brand_index" value="<?php echo $edit ? $data['brand_index'] : ''; ?>" placeholder="Brand Index" class="form-control" id="brand_index">
    </div>
<!--  
    <div class="form-group">
        <label for="origin">Origin</label>
        <input type="text" name="origin" value="<?php echo $edit ? $data['origin'] : ''; ?>" placeholder="Origin" class="form-control" id="origin">
    </div>
--> 

	<div class="form-group">
      <label>Origin</label>
        <?php $opt_arr = $origins ?>
          <select name="brand" id="brand" class="form-control selectpicker" required="required">
            <option value="" >Please select brand</option>
        <?php
          foreach ($opt_arr as $opt) {
            if ($edit && $opt["id"] == $data['id']) {
             $sel = "selected";
            } else {
             $sel = "";
            }
              echo '<option value="'.$opt["id"].'"' . $sel . '>' . $opt["origin_city"] .", ". $opt["origin_country"] . '</option>';
            }
		?>
          </select>
    </div>
    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<script type="text/javascript">
	$(document).ready(function(){
		$('#sex').val($sexValue);
	});
</script>