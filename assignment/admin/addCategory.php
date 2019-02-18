<!DOCTYPE html>
<html>
	<head>
		<title>Add Category</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
	</head>
	<body>
		<?php
			require_once('sidenav.php');
		?>
		<div class="row parent-container">
			<div class="col s12 m12 l12">
				<h5 class="center-align">Add Category</h5>
				<div class="divider"></div>
				<div class="section"></div>
			</div>
	  		<div class="col s12">
	  			<div class="row" id="main-container">
	  				<form id="cat-from" action="javascript:alert( 'success!');" >
		  				<?php
		  					require_once('formCategory.php');
		  				?>
						<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
				  			<div class="row">
				  				<div class="col s12">
				  					<button class="btn right blue lighten-2 waves-effect waves-light" id="cat-add-btn">ADD Category</button>
				  				</div>
				  			</div>
				  		</div>
	  				</form>
	  			</div>
	  		</div>
	  		<!-- <div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
	  			<div class="row">
	  				<div class="col s12">
	  					<button type="submit"class="btn right blue lighten-2 waves-effect waves-light" id="cat-add-btn">ADD Category</button>
	  				</div>
	  			</div>
	  		</div> -->
	  	</div>
	</body>
</html>
<script type="text/javascript">
			$(document).ready(function(){
			    $('.sidenav').sidenav();
			    $('.collapsible').collapsible();
			    $("#cat-add-btn").click(function(){
			    });
			    $("form").submit(function(event)
			    	{
			    		if($("#category_name").val()=="")
				    	{
				    		swal("Required", "Enter Category Name", "error");
				    		event.preventDefault();
				    	}
			    		var cname=$("#category_name").val();
			  			var cdesc=$("#category_description").val();
			    		$.ajax({'url':'curdCategory.php','dataType':'json','type':'POST','data':{'category_name':cname,'category_description':cdesc,'opertaion':'add'}
			    			}).done(function(data)
					    		{
					    			console.log(data);
					    			swal(data["title"],data["message"],data["status"]);
					    			$("#category_name").val("");
					    			$("#category_description").val("");
					    		});
			    	});
		  	});
	  	 	function check(event)
		    {
		    	
		    }
		</script>