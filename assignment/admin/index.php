<?php
	session_start();
?>
<html>
	<head>
		<title>
			Dashboard
		</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
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
      			</div>
      		</div>
      	</div>
	</body>
</html>