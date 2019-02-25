function setCategory()
{
	$.ajax({'url':'UserController.php','dataType':'json','type':'POST','data':{'operation':'getAll'}})
    .done(function(data)
    {
    	//console.log(data);
    	var navCat="";
    	$.each(data["results"],function(key,value)
    	{
    		//alert(value["cat_name"]);
    		navCat+=" <li class='' onclick='getProduct("+value["cat_id"]+")'><a class='waves-effect'>"+value["cat_name"]+"</a></li>";
    		navCat+="<li class='divider'></li>";
    	});
    	$("#category").html(navCat);
    	$("#side-category").html(navCat);
    });
}
function getProduct(category='all',page=1)
{
	$.ajax({'url':'../admin/DashController.php','dataType':'json','type':'POST','data':{'operation':'getProduct','category':category,'page':page}})
    .done(function(data)
    {
    	constructProductGrid(data);
    });
}
function constructProductGrid(data)
{
	var temp="";
    	$.each(data["product_result"],function(key,value)
    	{
    		temp+='<div class="col s12 m6 l3 xl3">\
				      <div class="card hoverable">\
				        <div class="card-image">\
				          <img src="'+value["pro_image"]+'" class="product-card-image">\
				          <span class="card-title">'+value["pro_name"]+'</span>\
				          <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="addToCart('+value["pro_id"]+')"><i class="material-icons fa fa-plus" aria-hidden="true"></i></a>\
				        </div>\
				        <div class="card-content">\
				          <p>'+value["pro_desc"]+'</p>\
				          <h5>₹  '+value["pro_price"]+'</h5>\
				        </div>\
				      </div>\
				    </div>';
    	});
	$("#product-collection").html(temp);
}
function loginUser(event,formData)
{
	$.ajax({url:'UserController.php',type:'POST',data:formData, cache: false,
    contentType: false,
    processData: false
	}).done(function(data)
	{
		var obj = JSON.parse(data);
		console.log(obj);
		if(obj["status"]=="fail")
		{
			swal("Invalid","Invalid Credentials","error");
			$("#progress").fadeOut();
		}
		else
		{
			setTimeout(function(){$(location).attr('href',"index.php");},2000);
		}
	});
	
}
function newUser(event,formData)
{
	$.ajax({url:'UserController.php',type:'POST',data:formData, cache: false,
    contentType: false,
    processData: false
	}).done(function(data)
	{
		var obj = JSON.parse(data);
		console.log(obj);
		swal(obj["title"],obj["message"],obj["status"]);
		if(obj["status"]=="success")
		{
			setTimeout(function(){$(location).attr('href',"Login.php");},2000);
		}
	});
}
function search(event,keyword)
{
	if(event.which==13)
	{
		if(keyword!=null)
		{
			searchProduct(keyword);
		}
	}
}
function searchProduct(keyword)
{
	$.ajax({'url':'../admin/DashController.php','dataType':'json','type':'POST','data':{'operation':'search','keyword':keyword,'page':1}})
    .done(function(data)
    {
    	constructProductGrid(data);
    });
}
function addToCart(pro)
{
	$.ajax({'url':'UserController.php','dataType':'json','type':'POST','data':{'operation':'addToCart','product':pro}})
	.done(function(data)
	{
		swal(data["title"],data["message"],data["status"]);
	});
}
function loadCart()
{
	$.ajax({'url':'UserController.php','dataType':'json','type':'POST','data':{'operation':'loadCart'}})
	.done(function(data)
	{
		var temp="";
		// if(data==null)
		// 	temp="No Item in cart";
		$.each(data["results"],function(key,value)
		{
			temp+="<div class='section'></div><div class='row'><div class='col s4 m4 l4'><img src='"+value["pro_image"]+"' class='thumbnail'></div><div class='col s4 m4 l4'><h5 class='center-align'>"+value["pro_name"]+"</h5></div><div class='col s4 m4 l4'><h5 class='center-align'>₹   "+value["pro_price"]+"</h5></div></div>";
		});
		$("#cart-item").html(temp);
	});
}