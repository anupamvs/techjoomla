<?php
	require_once('Session.php');
	$session=new Session();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Products</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript" src="../assets/js/product.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$("#progress").fadeIn();
			    $('.sidenav').sidenav();
			    $('.tooltipped').tooltip();
			    $('.collapsible').collapsible();
			    $("#pro").addClass("active");
  				$(".collapsible").collapsible({accordion: false});
  				$("#pro-view").addClass("active");
		        $('.modal').modal();
		        $('.materialboxed').materialbox();
			    constructProduct();
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
				<h5 class="center-align">-   Products   -</h5>
				<div class="divider"></div>
				<div class="section"></div>
			</div>
	  		<div class="col s12">
	  			<div class="row" id="main-container">
	  				
	  			</div>
	  		</div>
	  	</div>
	  	<div id="modal1" class="modal">
		    <div class="modal-content">
		      <h4 id="modal-product-title"></h4>
		      <div class="divider"></div>
		      <div class="section"></div>
		      <div class="row">
		      	<div class="col s12 m6 l6 xl6">
		      		<img src="" id="modal-product-image" alt="" class="max-width-100-percent materialboxed">
		      	</div>
		      	<div class="col s12 m6 l6 xl6">
		      		<table>
				        <thead>
				        </thead>
				        <tbody>
				          <tr>
				            <th>Category</th>
				            <td id="modal-product-category"></td>
				          </tr>
				          <tr>
				            <th>Price</th>
				            <td id="modal-product-price"></td>
				          </tr>
				          <tr>
				            <th>Description</th>
				            <td id="modal-product-description"></td>
				          </tr>
				        </tbody>
				      </table>
		      	</div>
		      </div>
		    </div>
		    <div class="modal-footer">
		      	<a onclick="" class="modal-close waves-effect waves-green btn-flat red-text" id="modal-product-delete">Delete</a>
		      	<a href="" class="waves-effect waves-green btn-flat" id="modal-product-edit">Edit</a>
		    </div>
	  	</div>
	</body>
</html>