<?php
	if(!isset($_GET['cat']))
	{
		header('Location:viewCategory.php');
		die();
	}
	require_once('Session.php');
	$session=new Session();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Category</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript" src="../assets/js/category.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#progress").fadeIn();
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    setCategoryFields($("#category_id").val());
			    $("#cat-add-btn").click(function(){
			    });
			    $("form").submit(function(event)
			    	{
			    		updateCategory(event);
			    	});
			    $("#progress").fadeOut();
		  	});
		</script>
	</head>
	<body>
		<div class="progress" id="progress">
	      	<div class="indeterminate"></div>
	  	</div>
		<?php
			require_once('sidenav.php');
		?>
		<div class="row parent-container">
			<div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2">
				<h5 class="center-align">Edit Categories</h5>
				<div class="divider">
				</div>
				<div class="section"></div>
				<div class="section"></div>
			</div>
	  		<div class="col s12">
	  			<div class="row" id="main-container">

	  				<form id="cat-from" action="javascript:void(0)">
		  				<?php
		  					require_once('formCategory.php');
	  						echo "<input type='hidden' name='category_id' id='category_id' value='".$_GET['cat']."' />";
		  				?>
						<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
				  			<div class="row">
				  				<div class="col s12">
				  					<button class="btn right blue lighten-2 waves-effect waves-light" id="cat-add-btn">Update
				  					</button>
				  				</div>
				  			</div>
				  		</div>
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	</body>
</html>
