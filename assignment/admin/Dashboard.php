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
		<script type="text/javascript" src="https://cdnjs.com/libraries/Chart.js"></script>
		<script type="text/javascript" src="../assets/js/index.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    $("#dashboard").addClass("active");
  				$(".collapsible").collapsible({accordion: false});
  				setCount();
  				setChart();
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
				    <div class="col s12 m6 l4">
				      	<div class="card blue-grey darken-1 hoverable">
				        	<div class="card-content white-text">
					          	<span class="card-title">Total User</span>
					          	<p id="total-user" class="right-align large-text"></p>
				        	</div>
				        </div>
				    </div>
				    <div class="col s12">
				    	<canvas id="myChart"></canvas>
				    </div>
      			</div>
      		</div>
      		
      		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
      		<script>
				
			</script>
      	</div>
	</body>
</html>