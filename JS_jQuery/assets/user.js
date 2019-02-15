var result_keyword="";
var active;
var api_key="3356865d41894a2fa9bfa84b2b5f59bb";
var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": "https://api.themoviedb.org/3/search/person?include_adult=false&page=1&language=en-US",
	  "method": "GET",
	  "headers": {},
	  "data": {'api_key':'3356865d41894a2fa9bfa84b2b5f59bb','query':''}
	};
var result_data;
function getSuggestion(key)
{
		$("#progress").fadeIn();
		let temp=settings;
		temp["data"]["query"]=key;
		$("#suggest-main").hide();
		$.ajax(temp).done(function (data) {
		  $("#search-suggest").empty();
		  if(data["total_results"]==0)
		  {
		  	$("#progress").fadeOut();
		  	$("#suggest-main").show();
		  	$("#search-suggest").append("<div class='row valign-wrapper suggest'><div class='col s2 l2 m2 xl2'></div><div class='col s10 m10 l10 xl10'><span>No result Found</span></div></div>");
			//$("#search-suggest").append('<li class="collection-item avatar"><img src="'++'" alt="" class="circle"><span class="title">Title</span><p>First Line <br>Second Line</p><a href="#!" class="secondary-content"><i class="material-icons"></i></a></li>');
		  }
		  else
		  {
		  	$("#suggest-main").show();
		  	$("#progress").fadeOut();
		  	$.each(data['results'],function(key,value){
		  	var image_path;
		  	if(value['profile_path']!=null)
		  		image_path="https://image.tmdb.org/t/p/w500/"+value['profile_path'];
		  	else
	  			image_path="assets/img_avatar.png";
		  	$("#search-suggest").append("<div class='row valign-wrapper suggest border-bottom' onclick='autoAdd(this)'><div class='col s2 l2 m2 xl2'><img src='"+image_path+"' class='circle responsive-img small-image'></div><div class='col s10 m10 l10 xl10'><span>"+value['name']+"</span></div></div>");
//$("#search-suggest").append('<li class="collection-item avatar"><img src="'+image_path+'" alt="" class="circle"><span class="title">'+value['name']+'</span><p>First Line <br>Second Line</p><a href="#!" class="secondary-content"><i class="material-icons"></i></a></li>');
})
		  }
		})
		.fail(function()
		{
			swal ( "Oops" ,  "Something went wrong!" ,  "error" );
		});	
}
function autoAdd(el)
{
	$("#keyword").val($(el).text());
	$("#search-btn").trigger("click");
}
function showResults(key,page=1)
{
	$("#progress").fadeIn();
	$("#carousel-collection").empty();
	result_keyword=key;
	let temp_setting=settings;
	temp_setting["data"]["query"]=key;
	temp_setting["data"]["page"]=page;
	$("#suggest-main").hide();
	$("#collection").empty();
	//$("#progress").fadeOut();
	$.ajax(temp_setting).done(function (data) {
		if(data["total_results"]==0)
	 	{
		  	$("#progress").fadeOut();
		  	swal ( "Oops! "+ $("#keyword").val() ,  "No Result Found!" ,  "error" );
		  	$("#keyword").val("");
	 	}
		else
		{
			result_data=data;
		  	constructPagination(data["page"],data["total_pages"]);
		  	constructResultInfo(data);
		  	constructGrid(data);
		  	// $.each(data['results'],function(key,value){
		  	// var image_path;
		  	// if(value['profile_path']!=null)
		  	// 	image_path="https://image.tmdb.org/t/p/w500/"+value['profile_path'];
		  	// else
		  	// 	image_path="assets/default.png";
		  	// $("#collection").append("<div class='col s12 m6 l4 xl3'><a class='modal-trigger black-text' href='#modal1' onclick='active_Carousel("+key+")'><div class='card-panel hoverable'><div class='row'><div class='col s12'><div class='image-card'><div class='center-div'><img src='"+image_path+"' class='grid-image center-align'></div></div><div></div><div class='col s12 name-card'><h6 class='center-align'>"+value['name']+"</h6></div></div></a></div>");});
		  	//contructCarousel(data);
		}
	})
	.fail(function()
	{
		swal ( "Oops" ,  "Something went wrong!" ,  "error" );
	});
}
function constructGrid(data)
{

	$("#progress").fadeIn();
	$("#carousel-collection").empty();
	$("#carousel-collection").empty();
	$("#suggest-main").hide();
	$("#collection").empty();
	$.each(data['results'],function(key,value){
		  	var image_path;
		  	if(value['profile_path']!=null)
		  		image_path="https://image.tmdb.org/t/p/w500/"+value['profile_path'];
		  	else
		  		image_path="assets/default.png";
		  	$("#collection").append("<div class='col s12 m6 l4 xl3'><a class='modal-trigger black-text' href='#modal1' onclick='active_Carousel("+key+")'><div class='card-panel hoverable'><div class='row'><div class='col s12'><div class='image-card'><div class='center-div'><img src='"+image_path+"' class='grid-image center-align'></div></div><div></div><div class='col s12 name-card'><h6 class='center-align'>"+value['name']+"</h6></div></div></a></div>");});
	$("#collection-main").show();
  	$("#progress").fadeOut();
  	contructCarousel(data);
}
function active_Carousel(key)
{
	active=key;
}
	function next()
	{
		$("#carousel-collection").carousel('next');
	}
	function prev()
	{
		$("#carousel-collection").carousel('prev');
	}
function contructCarousel(data)
{
	$.each(data['results'],function(key,value){
		var image_path;
	  	if(value['profile_path']!=null)
	  		image_path="https://image.tmdb.org/t/p/w500/"+value['profile_path'];
	  	else
	  		image_path="assets/default.png";
		$("#carousel-collection").append("<div class='row carousel-item' style='height: 100%'><div class='col s12 m6 l6 xl6 prev-view'><img src='"+image_path+"' class='modal-image'></div><div class='col s12 m6 l6 xl6 next-view'><h5>"+value["name"]+"</h5><div class='divider'></div><table class='striped highlight'><thead></thead><tbody><tr><td>Popularity</td><td>"+value["popularity"]+"</td></tr></tbody></table><div class='divider'></div><h6>Movies</h6><div class='divider'></div><table class='striped highlight'><thead><th>Title</th><th>Rating</th></thead><tbody>"+constructMovieGrid(value["known_for"])+"</tbody></table></div>");
	});
	$("#carousel-collection").append('<div class="carousel-fixed-item center"><a class="waves-effect grey-text darken-text-2 left" onclick="prev()"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a><a class="waves-effect grey-text  darken-text-2 right" onclick="next()"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></a></div>');
}
function constructMovieGrid(data)
{
	var x="";
	$.each(data,function(key,value)
	{
		x+="<tr><td>"+value["original_title"]+"</td><td>"+value["vote_average"]+"</td></tr>"
	});
	return x;
}
function constructPagination(page,total)
{
	$("#page-main-top").empty();
	$("#page-main-bottom").empty();
	$("#page-main-top").html('<ul class="pagination" id="page"><li class="" id="page-prev"><a><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="waves-effect" id="first-page"><a>First</a></li><li class="waves-effect" id="last-page"><a>Last</a></li><li class="waves-effect" id="page-next"><a><i class="fa fa-angle-right" aria-hidden="true"></i></a></li></ul>');
	var content="";
	var lim=0;
	$("#first-page a").on("click",function(){
		showResults(result_keyword,1);
	});
	$("#last-page a").on("click",function(){
		showResults(result_keyword,total);
	});
	
	if(page!=1)
	{
		$("#page-prev a").on("click",function(){
			showResults(result_keyword,page-1);
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
			showResults(result_keyword,page+1);
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
			showResults(result_keyword,$(this).text());
		});
	}
}
function constructResultInfo(data)
{
	$("#result-info").empty();
	let temp="<div class='center col' id='page-info-css'><div class='col'>Search for : <b>"+$("#keyword").val()+"</b></div>"+
				"<div class='col'>Page : <b>"+data["page"]+"</b></div>"+
				"<div class='col'>Total Page : <b>"+data["total_pages"]+"</b></div>"+
				"<div class='col'>Showing <b>"+data["results"].length+"</b> out of <b>"+data["total_results"]+"</b></div><div class='col'>Sort By : </div><div class='col'><a class='sort' onclick='sort(\"popularity\")'> Popularity </a></div><div class='col'><a class='sort' onclick='sort(\"name\")'> Name </a></div></div>";
	$("#result-info").html(temp);
}
function show(p)
{
	alert("Data - "+p);
}
function initCarouselModal() 
{
    var elems = document.querySelectorAll('.carousel');
    instances = M.Carousel.init(elems, {'fullWidth': true});
    instances[0].set(active);
}
$(window).scroll(function()
{
	if($(this).scrollTop()>200)
		$("#scroll-top").fadeIn();
	else
		$("#scroll-top").fadeOut();
});
function topScreen()
{
	window.scroll(0,0);
}
function sort(param,data=result_data)
{
	$("#progress").fadeIn();
   	var len = data['results'].length;
   	for (var i = len-1; i>=0; i--)
   	{
     	for(var j = 1; j<=i; j++)
     	{
       		if(data['results'][j-1][param]>data['results'][j][param])
	       	{
	            var temp = data['results'][j-1];
	            data['results'][j-1] = data['results'][j];
	            data['results'][j] = temp;
	        }
     	}
   	}
   	constructGrid (data);
   	
}