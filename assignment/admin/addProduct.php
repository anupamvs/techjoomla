<?php 
	session_start();
	$_SESSION["page"]="product";
	$_SESSION["option"]="add";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AddProduct</title>
	<?php
		require_once('../helpers/scripts_style.php');
	?>
	<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    $("#add-product").click(function()
			  		{
				  		$.ajax({url: "form.php", success: function(result){
		    						$("#main-container").html(result);
		  				}});
		  				
				  	});
			    $("#view-product").click(show);
			    $("")
			    $("#pro").addClass("active");
			    //$("#pro-add").addClass("active");
		  	});
	</script>
</head>
<body>
	<?php
		require_once('sidenav.php');
	?>
	<div class="row parent-container">
		<div class="col s12 m12 l12">
			<h5 class="center-align">Add Product</h5>
			<div class="divider"></div>
			<div class="section"></div>
		</div>
  		<div class="col s12">
  			<div class="row" id="main-container">
  				<?php
  					require_once('formProduct.php');
  				?>
  			</div>
  		</div>
  		<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
  			<div class="row">
  				<div class="col s12">
  					<button class="btn right blue lighten-2 waves-effect waves-light">Add Product</button>
  				</div>
  			</div>
  		</div>
  	</div>
</body>
</html>