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
        <input type="number" min="0" name="employees" value="<?php echo $edit ? $data['employees'] : ''; ?>" placeholder="Employees" class="form-control" id="employees">
    </div>
	
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	$("#data_form").validate({
        rules: {
        	shop_name: {
                 required: true,
                 minlength: 1
             },
             shop_address: {
                 required: true,
                 minlength: 1
             },
             employees: {
                 required: true,
                 minlength: 1
             }
         },
         messages: {
        	 shop_name: 'Please add shop name!',
        	 shop_address: 'Please add address of shop!',
        	 employees: 'Please add number of employees!'
         }
     });
});

</script>
