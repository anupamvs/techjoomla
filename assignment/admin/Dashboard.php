<?php
	require_once('Session.php');
	$session=new Session();
?>
<html>
	<head>
		<title>
			Dashboard
		</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript" src="../assets/js/index.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    $("#dashboard").addClass("active");
  				$(".collapsible").collapsible({accordion: false});
  				setCount();
		  	});
		</script>
	</head>
	<body>
		<?php
			require_once('sidenav.php');
		?>
      	<div class="row parent-container">
      		<div class="col s12">
      			<div class="row" id="main-container">
      				<div class="col s12 m6 l4">
				      	<div class="card blue-grey darken-1">
				        	<div class="card-content white-text hoverable">
					          	<span class="card-title">Total Categories</span>
					          	<p id="total-category" class="right-align large-text"></p>
				        	</div>
				        </div>
				    </div>
				    <div class="col s12 m6 l4">
				      	<div class="card blue-grey darken-1 hoverable">
				        	<div class="card-content white-text">
					          	<span class="card-title">Total Products</span>
					          	<p id="total-product" class="right-align large-text"></p>
				        	</div>
				        </div>
				    </div>
      			</div>
      		</div>
      	</div>
	</body>
</html>