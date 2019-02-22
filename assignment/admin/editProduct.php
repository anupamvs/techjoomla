<?php
	if(!isset($_GET['pro']))
	{
		header('Location:viewProduct.php');
		die();
	}
	require_once('Session.php');
	$session=new Session();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<?php
		require_once('../helpers/scripts_style.php');
	?>
	<script type="text/javascript" src="../assets/js/product.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    setProductFields($("#product_id").val());
			    setCategory();
			    //$('select').formSelect({});
			    $("form").submit(function(event)
		    	{
		    		var formData = new FormData();

		    		formData.append('product_category',$("#product_category").val());
		    		formData.append('product_name',$("#product_name").val());
		    		formData.append('product_description',$("#product_descrption").val());
		    		formData.append('product_price',$("#product_price").val());
		    		formData.append('product_id',$("#product_id").val());
		    		formData.append('product_image',$("#product_image")[0].files[0]);
		    		formData.append('operation','updatePro');
		    		updateProduct(formData);
		    	});
		  	});
	</script>
</head>
<body>
	<?php
		require_once('sidenav.php');
	?>
	<div class="progress" id="progress">
      	<div class="indeterminate"></div>
  	</div>
	<div class="row parent-container">
		<div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2">
			<h5 class="center-align">Edit Product</h5>
			<div class="divider"></div>
			<div class="section"></div>
		</div>
		<div class="col s12">
  			<div class="row" id="main-container">
  				<form id="pro-from" action="javascript:void(0)" enctype="multipart/form-data">
	  				<?php
	  					require_once('formProduct.php');
	  					echo "<input type='hidden' name='product_id' id='product_id' value='".$_GET['pro']."' />";
	  				?>
					<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
			  			<div class="row">
			  				<div class="col s12">
			  					<button class="btn right blue lighten-2 waves-effect waves-light" id="cat-add-btn">Update</button>
			  				</div>
			  			</div>
			  		</div>
  				</form>
  			</div>
  		</div>
  	</div>
</body>
</html>

<!-- {'product_name':pname,'product_description':pdesc,'product_category':pcat,'product_price':pprice,'operation':'addPro'} -->
<!-- ₹ -->