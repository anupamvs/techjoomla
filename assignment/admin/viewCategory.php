<?php
	require_once('Session.php');
	$session=new Session();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Categories</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript" src="../assets/js/category.js"></script>
		<script type="text/javascript">
				$(document).ready(function()
				{
					$("#progress").fadeIn();
				    $('.sidenav').sidenav();
				    $('.tooltipped').tooltip();
				    $('.collapsible').collapsible();
				    $("#cat").addClass("active");
  					$(".collapsible").collapsible({accordion: false});
  					$("#cat-view").addClass("active");
				    constructCategory();
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
	  		<div class="col s12">
	  			<div class="row" id="main-container">
	  				<div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2">
	  					<h5 class="center-align">Categories</h5>
	  					<div class="divider">
	  					</div>
	  					<div class="section"></div>
	  				</div>
					
	  				<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
	  					<ul class="collapsible popout" id="category-collection">
	  					</ul>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</body>
</html>