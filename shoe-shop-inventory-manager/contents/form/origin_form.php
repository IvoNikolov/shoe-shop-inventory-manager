<fieldset>	
	<div class="form-group">
        <label for="origin_country">Country</label>
        <input type="text" name="origin_country" value="<?php echo $edit ? $data['origin_country'] : ''; ?>" placeholder="Country" class="form-control" id="origin_country">
    </div> 

	<div class="form-group">
        <label for="origin_city">City</label>
        <input type="text" name="origin_city" value="<?php echo $edit ? $data['origin_city'] : ''; ?>" placeholder="City" class="form-control" id="origin_city">
    </div>
    
    <div class="form-group">
        <label for="phone_number">Phone number</label>
        <input type="text" name="phone_number" value="<?php echo $edit ? $data['phone_number'] : ''; ?>" placeholder="Phone number" class="form-control" id="phone_number">
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<script type="text/javascript">
	$(document).ready(function(){
		$('#sex').val($sexValue);
		  $("#warehouse_form").validate({
           rules: {
                origin_country: {
                    required: true,
                    minlength: 1
                },
                origin_city: {
                    required: true,
                    minlength: 1
                },
                phone_number: {
                    required: true,
                    minlength: 1
                },
            },
            messages: {
				origin_country: "Please add country!",
                origin_city: "Please add city!",
                phone_number: "Please add phone number!"
            }
        });
	});
</script>