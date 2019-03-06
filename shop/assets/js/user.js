var cat="";
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
    		navCat+=" <li class='' onclick='getProduct("+value["cat_id"]+")'><a class='waves-effect black-text'>"+value["cat_name"]+"</a></li>";
    		navCat+="<li class='divider'></li>";
    	});
    	$("#category").html(navCat);
    	$("#side-category").html(navCat);
    });
}
function getProduct(category='all',page=1)
{
	cat=category;
	$.ajax({'url':'../admin/DashController.php','dataType':'json','type':'POST','data':{'operation':'getProduct','category':category,'page':page}})
    .done(function(data)
    {
    	constructProductGrid(data);
    	constructPagination(data["page"],data["total_pages"]);
    });
}
function constructProductGrid(data)
{
	var temp="";
    	$.each(data["product_result"],function(key,value)
    	{
    		temp+='<div class="col s12 m6 l3 xl3">\
				      <div class="card hoverable">\
				        <div class="card-image image-div-thumb">\
				          <img src="'+value["pro_image"]+'" class="product-card-image">\
				          <div class="card-title layer">'+value["pro_name"]+'</div>\
				          <a class="btn-floating halfway-fab waves-effect waves-light green lighten-1" onclick="addToCart('+value["pro_id"]+')"><i class="material-icons fa fa-cart-plus" aria-hidden="true"></i></a>\
				        </div>\
				        <div class="card-content">\
				          <p class="truncate">'+value["pro_desc"]+'</p>\
				          <h5>₹  '+value["pro_price"]+'</h5>\
				        </div>\
				      </div>\
				    </div>';
    	});
	$("#product-collection").html(temp);
}
function constructPagination(page,total)
{
	$("#page-main-top").empty();
	$("#page-main-bottom").empty();
	$("#page-main-top").html('<ul class="pagination" id="page"><li class="" id="page-prev"><a><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="waves-effect" id="first-page"><a>First</a></li><li class="waves-effect" id="last-page"><a>Last</a></li><li class="waves-effect" id="page-next"><a><i class="fa fa-angle-right" aria-hidden="true"></i></a></li></ul>');
	var content="";
	var lim=0;
	$("#first-page a").on("click",function(){
		getProduct(cat,1);
	});
	$("#last-page a").on("click",function(){
		getProduct(cat,total);
	});
	
	if(page!=1)
	{
		$("#page-prev a").on("click",function(){
			getProduct(cat,page-1);
		});
		$("#page-prev").removeClass("disabled");
		$("#first-page").removeClass("disabled");
	}
	else
	{
		$("#first-page").addClass("disabled");
		$("#page-prev").addClass("disabled");
	}

	if(page!=total)
	{
		$("#page-next a").on("click",function(){
			getProduct(cat,page+1);
		});
		$("#last-page").removeClass("disabled");
		$("#page-next").removeClass("disabled");
	}
	else
	{
		$("#last-page").addClass("disabled");
		$("#page-next").addClass("disabled");
	}
	var temp=(page-2>0)?page-2:1;
	for(var i=temp;i<=total&&lim<5;i++,lim++)
	{
		content+='<li class="waves-effect" id="page-'+i+'"><a>'+i+'</a></li>';
		
	}
	$("#first-page").after(content);
	$("#page-"+page).addClass("active");
	lim=0;
	for(var i=temp;i<=total&&lim<5;i++,lim++)
	{
		$("#page-"+i+" a").on("click",function(){
			getProduct(cat,$(this).text());
		});
	}
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
			setTimeout(function(){
    				$(location).attr('href',"search.php?search="+keyword);
    			},500);
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
			temp+="<div class='section'></div><div class='row'><div class='col s4 m4 l4'><img src='"+value["pro_image"]+"' class='thumbnail cart-img'></div><div class='col s4 m4 l4'><h5 class='center-align'>"+value["pro_name"]+"</h5></div><div class='col s3 m3 l3'><h5 class='center-align'>₹   "+value["pro_price"]+"</h5></div><div class='col s1'><h5 onclick='deleteFromCart("+value["id"]+")' class='hover-red modal-close'><i class='fa fa-trash' aria-hidden='true'></i></h5></div></div>";
		});
		$("#cart-item").html(temp);
	});
}
function deleteFromCart(e)
{
	$.ajax({'url':'UserController.php','dataType':'json','type':'POST','data':{'operation':'deleteCart','c':e}})
	.done(function(data)
	{
		console.log(data);
		swal(data["title"],data["message"],data["status"]);
	});
}