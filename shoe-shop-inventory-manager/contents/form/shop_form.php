<fieldset>	
	<div class="form-group">
        <label for="shop_name">Name</label>
        <input type="text" name="shop_name" value="<?php echo $edit ? $data['shop_name'] : ''; ?>" placeholder="Name" class="form-control" id="shop_name">
    </div> 

	<div class="form-group">
        <label>Address</label>
        <div>
	        <input type="text" name="shop_street" value="<?php echo $edit ? $data['shop_street'] : ''; ?>" placeholder="Street" class="form-control" id="shop_street">
	        <input type="text" name="shop_city" value="<?php echo $edit ? $data['shop_city'] : ''; ?>" placeholder="City" class="form-control" id="shop_city">
	        <input type="text" name="shop_country" value="<?php echo $edit ? $data['shop_country'] : ''; ?>" placeholder="Country" class="form-control" id="shop_country">   
        </div>
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
             shop_street: {
                 required: true,
                 minlength: 1
             },
             shop_city: {
                 required: true,
                 minlength: 1
             },
             shop_country: {
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
        	 shop_street: 'Please add street!',
        	 shop_city: 'Please add address city!',
        	 shop_country: 'Please add country!',        	 
        	 employees: 'Please add number of employees!'
         }
     });
});

</script>
