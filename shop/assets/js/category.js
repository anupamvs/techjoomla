function constructCategory()
{
	$("#category-collection").hide();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'operation':'getAll'}})
    .done(function(data)
    {
    	$("#progress").fadeIn();
    	if(data["total"]==0)
    	{
    		swal("Sorry", "No Category Found", "warning");
    	}
    	else
    	{
    		var temp="";
    		$.each(data["results"],function(key,value){
    			temp+="<li><div class='collapsible-header waves-effect waves-light'>"+value["cat_name"]+"<div style='right:0px;' class='right'><a href='editCategory.php?cat="+value["cat_id"]+"'><i class='fa fa-pencil green-text'  aria-hidden='true'></i></a><a onclick='deleteC("+value["cat_id"]+",\""+value["cat_name"]+"\")'><i class='fa fa-trash red-text' aria-hidden='true'></i></a></div></div><div class='collapsible-body'><span>"+value["cat_desc"]+"</span></div></li>";
    		});
    		$("#category-collection").html(temp);
    		$("#category-collection").fadeIn();
    		$("#progress").fadeOut();
    	}
    });
}
function deleteC(el,name)
{
	swal("Sure! Want to Delete "+name, {
	  buttons: {
	    catch: {
	      text: "Delete",
	      value: "yes",
	    },
	    cancel: "Cancel",
	    defeat: false,
	  },
	})
	.then((value) => {
	  switch (value) 
	  {
	    case "yes":
	      deleteCategory(el);
	      break;
	    default:
	      break;
	  }
	});
}
function deleteCategory(el)
{
	$("#progress").fadeIn();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'operation':'delete','category_id':el}})
	.done(function(data){
		swal(data["title"],data["message"],data["status"]);
	});
	constructCategory();
	$("#progress").fadeOut();
}
function setCategoryFields(el)
{
	$("#progress").fadeIn();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'category_id':el,'operation':'get'}}).done(function(data)
    		{
    			if(data['total']==0)
    			{
    				swal("Invalid !", "No Such Category Found.", "warning");
    				setTimeout(function(){$(location).attr('href',"viewCategory.php");},2000);
    			}
    			else
    			{
	    			$("#category_name").val(data['result']['cat_name']);
	    			$("#category_description").val(data['result']['cat_desc']);
	    			$("#category_id").val(data['result']['cat_id']);
	    		}
    		});
	$("#progress").fadeOut();
}
function updateCategory(event)
{
	$("#progress").fadeIn();
	if($("#category_name").val()=="")
	{
		swal("Required", "Enter Category Name", "error");
		event.preventDefault();
	}
	var cname=$("#category_name").val();
		var cdesc=$("#category_description").val();
		var cid=$("#category_id").val();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'category_name':cname,'category_description':cdesc,'category_id':cid,'operation':'update'}
		}).done(function(data)
    		{
    			console.log(data);
    			swal(data["title"],data["message"],data["status"]);
    			$("#category_name").val("");
    			$("#category_description").val("");
    			$("#category_id").val("");
    			setTimeout(function(){
    				$(location).attr('href',"viewCategory.php");
    			},2000);
    		});
	$("#progress").fadeOut();
}
function addCategory(event)
{
	if($("#category_name").val()=="")
	{
		swal("Required", "Enter Category Name", "error");
		event.preventDefault();
	}
	var cname=$("#category_name").val();
		var cdesc=$("#category_description").val();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'category_name':cname,'category_description':cdesc,'operation':'add'}
		}).done(function(data)
    		{
    			console.log(data);
    			swal(data["title"],data["message"],data["status"]);
    			$("#category_name").val("");
    			$("#category_description").val("");
    		});
}