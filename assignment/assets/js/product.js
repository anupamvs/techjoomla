function addProduct(event,formData)
{
	if($("#product_name").val()=="")
	{
		//swal("Required", "Enter product Name", "error");
		event.preventDefault();
	}
	$.ajax({url:'ProductController.php',type:'POST',data:formData, cache: false,
    contentType: false,
    processData: false
	}).done(function(data)
		{
			//alert("Hello World!");
			//console.log(data);
			$("#product_category").val('').find("option[value='']").attr("selected",true);
			$("#product_name").val("");
			$("#product_descrption").val("");
			//$("#product_category option[value='']").attr("selected","selected");
			$(".select-wrapper ul li").first().attr("class","active");
			$("#product_price").val("");
			var obj = JSON.parse(data);
			console.log(obj);
			swal(obj["title"],obj["message"],obj["status"]);
			setTimeout(function(){$(location).attr('href',"addProduct.php");},1000);
		});

}
function setCategory()
{
	$("#progress").fadeIn();
	$.ajax({'url':'CategoryController.php','dataType':'json','type':'POST','data':{'operation':'getAll'}})
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
    			temp+="<option class='black-text' value='"+value['cat_id']+"'>"+value['cat_name']+"</option>";
    		});
    		$("#product_category").append(temp);
    	}
    	var elems = document.querySelectorAll('select');
		var instances = M.FormSelect.init(elems,{});
		$("#progress").fadeOut();
    });
}
function getProductJSON(el)
{
	var tp;
	$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'getPro','pro_id':el}})
	.done(function(data)
	{
		tp= data;
	});
	return tp;
}
function constructProduct()
{
	$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'getAllPro'}})
	.done(function(data)
	{
		console.log(data);
		if(data["total"]==0)
			swal("Sorry","No Product Found","warning");
		else
		{
			constructProductGrid(data);
		}
	});
}
function constructProductGrid(data)
{
	//alert("Hey !"+data);
	var temp="";
	$.each(data["results"],function(key,value)
		{
			temp+='<div class="col s12 ml4 s12 m4 xl4"><div class="card-panel"><div class="card-content"><span class="card-title capitalize truncate">'+value["pro_name"]+'</span></div><div class="divider"></div><div class="section"></div><div class="card-action"><a class="red-text" onClick="deleteProduct('+value['pro_id']+',\''+value['pro_name']+'\')">Delete</a><a class="right modal-trigger" href="#modal1" onClick="viewProduct('+value['pro_id']+')">View</a></div></div></div>';
		});
	$("#main-container").html(temp);
}
function deleteProduct(el)
{
	alert("delete Product : "+el);
}
function viewProduct(el)
{
	$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'getPro','pro_id':el}})
	.done(function(data)
	{
		if(data["total"]==0)
		{
			swal("Invalid","Product Not Found","warning");
		}
		else
		{
			$("#modal-product-title").html(data["result"]["pro_name"]);
			$("#modal-product-category").html(data["result"]["cat_name"]);
			$("#modal-product-description").html(data["result"]["pro_desc"]);
			$("#modal-product-price").html("₹  "+data["result"]["pro_price"])
			$("#modal-product-image").attr("src",data["result"]["pro_image"]);
			$("#modal-product-image").attr("alt",data["result"]["pro_name"]);
			$("#modal-product-delete").attr("onClick","deleteProduct('"+data["result"]["pro_id"]+"','"+data["result"]["pro_name"]+"')");
			$("#modal-product-edit").attr("href","editProduct.php?pro="+data["result"]["pro_id"]);
		}
	});
}
function editProduct(el)
{
	alert("Edit Product : "+el);
}
function setProductFields(el)
{
	$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'getPro','pro_id':el}})
	.done(function(data)
	{
		console.log(data);
		if(data["total"]==0)
		{
			swal("Invalid","Product didn't Exist","warning");
			setTimeout(function(){$(location).attr('href',"viewProduct.php");},2000);
		}
		else
		{
			$("#product_name").val(data["result"]["pro_name"]);
			$("#product_price").val(data["result"]["pro_price"]);
			$("#product_descrption").val(data["result"]["pro_desc"]);
			$("#product_category").val("'"+data["result"]["pro_cat"]+"'").find("option [value='"+data["result"]["pro_cat"]+"']").attr("selected",true);
			//$("#product_image").val(data["result"]["pro_image"]);
		}
	});	
}
function updateProduct(formData)
{
	$.ajax({url:'ProductController.php',type:'POST',data:formData, cache: false,
    contentType: false,
    processData: false
	}).done(function(data)
	{
		var obj = JSON.parse(data);
		swal(obj["title"],obj["message"],obj["status"]);
		if(obj["status"]=="success")
		{
			setTimeout(function(){$(location).attr('href',"viewProduct.php");},2000);
		}
	});
}
function deleteProduct(el,name)
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
	      deletePro(el);
	      break;
	    default:
	      break;
	  }
	});
}
function deletePro(el)
{
	$("#progress").fadeIn();
	$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'deletePro','pro_id':el}})
	.done(function(data){
		swal(data["title"],data["message"],data["status"]);
	});
	constructProduct();
	$("#progress").fadeOut();
}