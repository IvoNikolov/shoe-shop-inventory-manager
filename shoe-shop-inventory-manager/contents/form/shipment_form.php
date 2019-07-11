<fieldset>	
	<div class="form-group">
        <label for="shipment_number">Shipment Number</label>
        <input type="text" name="shipment_number" value="<?php echo $edit ? $data['shipment_number'] : ''; ?>" placeholder="Shipment number" class="form-control" id="shipment_number">
    </div> 
    
    <div class="form-group">
        <label for="shipment_origin">Shipment Number</label>
        <input type="text" name="shipment_origin" value="<?php echo $edit ? $data['shipment_origin'] : ''; ?>" placeholder="Origin country" class="form-control" id="shipment_origin">
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
        	   shipment_number: {
                    required: true,
                    minlength: 1
                },
                shipment_origin: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
            	shipment_number: "Please add shipment number!",
				shipment_origin: "Please add shipment origin!"
            }
        });
	});
</script>
