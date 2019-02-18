<!DOCTYPE html>
<html>
	<head>
		<title>View Categories</title>
		<?php
			require_once('../helpers/scripts_style.php');
		?>
		<script type="text/javascript">
				$(document).ready(function(){
					$("#category-collection").hide();
					$("#progress").fadeIn();
				    $('.sidenav').sidenav();
				    $('.tooltipped').tooltip();
				    $('.collapsible').collapsible();
				    $.ajax({'url':'curdCategory.php','dataType':'json','type':'POST','data':{'opertaion':'getAll'}})
				    .done(function(data)
				    {
				    	if(data["total"]==0)
				    	{
				    		swal("Sorry", "No Category Found", "warning");
				    	}
				    	else
				    	{
				    		var temp="";
				    		$.each(data["results"],function(key,value){
				    			temp+="<li><div class='collapsible-header waves-effect waves-light'>"+value["cat_name"]+"<div style='right:0px;' class='right'><a class='tooltipped' data-position='right' data-tooltip='I am a tooltip'><i class='fa fa-pencil green-text'  aria-hidden='true'></i></a><a><i class='fa fa-trash red-text' aria-hidden='true'></i></a></div></div><div class='collapsible-body'><span>"+value["cat_desc"]+"</span></div></li>";
				    		});
				    		$("#category-collection").html(temp);
				    		$("#category-collection").fadeIn();
				    		$("#progress").fadeOut();
				    	}
				    });
				    $("#cat").addClass("active");
					$("#cat-view").addClass("active");
					$('.collapsible').collapsible('open', 1);
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