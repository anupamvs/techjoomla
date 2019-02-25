<!DOCTYPE html>
<html>
<head>
	<title>New User</title>
	<?php
		require_once('../helpers/scripts_style.php');
	?>
	<script type="text/javascript" src="../assets/js/user.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#progress").fadeOut();
			$("form").submit(function(event)
	    	{
	    		$("#progress").fadeIn();
	    		var formData = new FormData();
	    		formData.append('name',$("#name").val());
	    		formData.append('email',$("#email").val());
	    		formData.append('pass',$("#pass").val())
	    		formData.append('operation','signup')
	    		newUser(event,formData);
	    	});
		});
	</script>
</head>
<body>
	<div>
		<div class="login z-depth-3" style="margin-top: 2em !important;">
			<div class="progress absolute rounded-border-top" id="progress">
		      	<div class="indeterminate"></div>
		  	</div>
			<div class="row">
				<div class="col s12">
					<div class="row padding-25" >
						<div class="col s12">
							<h5 class="center-align">Signup</h5>
							<div class="divider"></div>
							<div class="section"></div>
						</div>
						<form method="POST" action="javascript:void(0)">
							<div class="input-field col s12">
					          	<input id="name" type="text" required="Enter Name">
					         	<label for="name">Email</label>
					        </div>
							<div class="input-field col s12">
					          	<input id="email" type="text" required="Enter Email">
					         	<label for="email">Email</label>
					        </div>
					        <div class="input-field col s12">
					          	<input id="pass" type="password" required="Enter Password">
					         	<label for="pass">Password</label>
					        </div>
					        <div class="input-field col s12">
					          	<input id="cnfpass" type="password" required="Enter Confirm Password">
					         	<label for="cnfpass">Password</label>
					        </div>
					        <div class="input-field col s12">
					        	<button class="waves-effect waves-light btn blue lighten-2 right" type="submit">SignUp</button>
					        </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>