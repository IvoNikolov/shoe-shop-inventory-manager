<fieldset>	
	<div class="form-group">
        <label for="shoe_index">Index</label>
        <input type="text" name="shoe_index" value="<?php echo $edit ? $data['shoe_index'] : ''; ?>" placeholder="Index" class="form-control" id="shoe_index">
    </div> 
    
    <div class="form-group">
        <label>Brand</label>
           <?php $opt_arr = $brands ?>
            <select name="brand" id="brand" class="form-control selectpicker" required="required">
                <option value="" >Please select brand</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt["id"] == $data['id']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt["id"].'"' . $sel . '>' . $opt["brand_name"] . '</option>';
                }

                ?>
            </select>
    </div>
    
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" value="<?php echo $edit ? $data['type'] : ''; ?>" placeholder="Type" class="form-control" id="type">
    </div>
  	<div class="form-group">
        <label for="sex">Sex</label>
        <select type="text" name="sex" placeholder="Sex" class="form-control" id="sex">
		  <option value="male">Male</option>
		  <option value="female">Female</option>
		  <option value="unisex">Unisex</option>
		</select>
    </div>

	<div class="form-group">
        <label for="size">Size</label>
        <input type="text" name="size" onkeypress="return((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46)" value="<?php echo $edit ? $data['size'] : ''; ?>" placeholder="Size" class="form-control" id="size">
    </div>
    
    <div class="form-group">
        <label for="color">Color</label>
        <input type="text" name="color" value="<?php echo $edit ? $data['color'] : ''; ?>" placeholder="Color" class="form-control" id="color">
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo $edit ? $data['price'] : ''; ?>" placeholder="Price" class="form-control" id="price">
    </div>
	
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	//$('#sex').val($sexValue);
	$("#data_form").validate({
        rules: {
             shoe_index: {
                 required: true,
                 minlength: 1
             },
             brand: {
                 required: true,
                 minlength: 1
             },
             type: {
                 required: true,
                 minlength: 1
             },
             size: {
                 required: true,
                 minlength: 1
             },
             color: {
                 required: true,
                 minlength: 1
             },
             price: {
                 required: true,
                 minlength: 1
             }
         },
         messages: {
				shoe_index: 'Please add index!',
				brand: 'Please add brand!',
				type: 'Please add type!',
				size: 'Please add size!',
				color: 'Please add color!',
				price: 'Please add price!'	
         }
     });
});
</script>