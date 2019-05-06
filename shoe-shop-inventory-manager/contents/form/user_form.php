<fieldset>
    <div class="form-group">
        <label class="col-md-4 control-label">User</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  type="text" name="user_id" placeholder="User" class="form-control" value="<?php echo ($edit) ? $admin_account['user_id'] : ''; ?>" autocomplete="off">
            </div>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >Password</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control" required="" autocomplete="off">
            </div>
        </div>
    </div>
	<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >First Name</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                <input type="text" name="first_name" placeholder="First Name" class="form-control" required="" value="<?php echo ($edit) ? $admin_account['first_name'] : ''; ?>">
            </div>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >Family Name</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                <input type="text" name="last_name" placeholder="Family Name " class="form-control" required="" value="<?php echo ($edit) ? $admin_account['last_name'] : ''; ?>">
            </div>
        </div>
    </div>
	<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >Email</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                <input type="text" name="email" placeholder="Email" class="form-control" required="" value="<?php echo ($edit) ? $admin_account['email'] : ''; ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Role</label>
        <div class="col-md-4">
			<?php foreach($roles as $role) { ?>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="<?php echo $role["id"]; ?>" <?php echo ($edit && $admin_account['role'] == $role["id"]) ? "checked": $role_default ; ?>/> <?php echo $role["role_name"]; ?>
                </label>
            </div>
			<?php	} ?>
        </div>
    </div>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-warning" > Save <span class="glyphicon glyphicon-send"></span></button>
        </div>
    </div>
</fieldset>

<script type="text/javascript">
    $(document).ready(function(){
       $("#user_form").validate({
           rules: {
                username: {
                    required: true,
                    minlength: 1
                },
               	password: {
                    required: true,
                    minlength: 6
                },
                real_name: {
                    required: true,
                    minlength: 1
                },
                email: {
                    required: true,
                    email: true
                },
                 
            },
            messages: {
				username: "Add username!",
				password: {
					required : "Add password!",
					minlength: "Password should be atleast 6 digits!"
				},
				real_name: "Add name",
				email:{
					required: "Add email!",
					email: "Add vali email!"
				} 
            },
        });
    });
</script>