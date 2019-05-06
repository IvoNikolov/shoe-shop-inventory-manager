<fieldset>	
	<div class="form-group">
        <label for="shop_name">Name</label>
        <input type="text" name="shop_name" value="<?php echo $edit ? $data['shop_name'] : ''; ?>" placeholder="Name" class="form-control" id="shop_name">
    </div> 

	<div class="form-group">
        <label for="shop_address">Address</label>
        <input type="text" name="shop_address" value="<?php echo $edit ? $data['shop_address'] : ''; ?>" placeholder="Address" class="form-control" id="shop_address">
    </div>
    
    <div class="form-group">
        <label for="employees">Employees</label>
        <input type="text" name="employees" value="<?php echo $edit ? $data['employees'] : ''; ?>" placeholder="Employees" class="form-control" id="employees">
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
