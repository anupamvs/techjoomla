 <?php
 /* if(isset($_SESSION["page"]))
  {
    if($_SESSION["page"]=="product")
    {
      echo "<script>alert('hello');</script>";
      echo "<script>$('#pro').addClass('active')</script>";
      if($_SESSION["option"]=="add")
        echo "<script>$('#pro-add').addClass('active')</script>";
      else
        echo "<script>$('#pro-view').addClass('active')</script>";
    }
  }*/
?> 
<a href="#" data-target="slide-out" class="sidenav-trigger menu-icon">Menu</a>
<ul id="slide-out" class="sidenav sidenav-fixed " style="transform: translateX(0px);">
<li>
	<div class="user-view">
      	<div class="background">
        	<img src="../assets/images/cover.jpg">
      	</div>
      	<a href="#user"><img class="circle" src="../assets/images/avatar.png"></a>
     	 <a href="#name"><span class="white-text name">Admin</span></a>
      	<a href="#email"><span class="white-text email">Admin@techjoomla.com</span></a>
    </div>
</li>
<li>
	<ul class="collapsible collapsible-accordion">
      	<li id="pro">
        	<a class="collapsible-header">Product<i class="fa fa-angle-down" aria-hidden="true"></i>
        	</a>
        	<div class="collapsible-body">
              <ul>
                <li id="pro-add"><a  href="addProduct.php">Add</a></li>
                <li id="pro-view"><a href="viewProduct.php" id="view-product">View</a></li>
              </ul>
        	</div>
      	</li>
    </ul>
</li>
<li><div class="divider"></div></li>
<li>
	<ul class="collapsible collapsible-accordion">
      	<li id=cat>
        	<a class="collapsible-header">Category<i class="fa fa-angle-down" aria-hidden="true"></i></a>
        	<div class="collapsible-body">
              <ul>
                <li id="cat-add"><a href="addCategory.php">Add</a></li>
                <li id="cat-view"><a href="viewCategory.php">View</a></li>
              </ul>
        	</div>
      	</li>
    </ul>
</li>
</ul>