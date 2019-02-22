function loginUser(event,formData)
{
	//console.log(formData);
	//$.ajax({'url':'ProductController.php','dataType':'json','type':'POST','data':{'operation':'deletePro','pro_id':el}})
	$.ajax({'url':'SecurityController.php','type':'POST','data':formData,cache: false,
    contentType: false,
    processData: false})
	.done(function(data)
	{
		//console.log(data);
		var obj=JSON.parse(data);
		if(obj["status"]=="fail")
		{
			swal("Inavlid",obj["message"],"error");
			$("#progress").fadeOut(1000);
		}
		else
		{
			//swal("Success","valid User","success");
			setTimeout(function(){$(location).attr('href',"Dashboard.php");},2000);
		}
	});
}
function setCount()
{
	//alert("SetCount");
	$.ajax({'url':'DashController.php','type':'POST','data':{'operation':'set'}})
	.done(function(data)
	{
		var obj=JSON.parse(data);
		$("#total-category").html(obj["total_category"]);
		$("#total-product").html(obj["total_product"]);
	})
}