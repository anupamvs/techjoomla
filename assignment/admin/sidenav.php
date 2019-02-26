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
<span class="menu menu-bar-top"><a href="#" data-target="slide-out" class="top-nav sidenav-trigger full hide-on-large-only"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a></span>
<ul id="slide-out" class="sidenav sidenav-fixed " style="transform: translateX(-105%);">
<li>
	<div class="user-view">
      	<div class="background">
        	<img src="../assets/images/cover.jpeg">
      	</div>
      	<a href="#user"><img class="circle" src="../assets/images/avatar.png"></a>
     	 <a href="#name"><span class="white-text name"><?php echo $_SESSION["user_name"] ?></span></a>
      	<a href="#email"><span class="white-text email"><?php echo $_SESSION["user_email"] ?></span></a>
    </div>
</li>
<li>
  <ul class="collapsible collapsible-accordion">
        <li id="dashboard">
          <a  href="Dashboard.php" class="collapsible-header waves-effect" >Dashboard<i class="fa fa-tachometer" aria-hidden="true"></i></a>
          <div class="collapsible-body">
              <ul>
              </ul>
          </div>
        </li>
    </ul>
</li>
<li>
	<ul class="collapsible collapsible-accordion">
      	<li id="pro">
        	<a class="collapsible-header waves-effect" >Product<i class="fa fa-angle-down" aria-hidden="true"></i>
        	</a>
        	<div class="collapsible-body">
              <ul>
                <li id="pro-add"><a  href="addProduct.php" class="waves-effect">Add<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                <li id="pro-view"><a href="viewProduct.php" class="waves-effect">View<i class="fa fa-list" aria-hidden="true"></i></a></li>
              </ul>
        	</div>
      	</li>
    </ul>
</li>
<li><div class="divider"></div></li>
<li>
	<ul class="collapsible collapsible-accordion">
      	<li id="cat">
        	<a class="collapsible-header waves-effect" >Category<i class="fa fa-angle-down" aria-hidden="true"></i></a>
        	<div class="collapsible-body">
              <ul>
                <li id="cat-add"><a href="addCategory.php" class="waves-effect">Add<i class="fa fa-plus" aria-hidden="true"></i></a></li>
                <li id="cat-view"><a href="viewCategory.php" class="waves-effect">View<i class="fa fa-list" aria-hidden="true"></i></a></li>
              </ul>
        	</div>
      	</li>
    </ul>
</li>
<li><div class="divider"></div></li>
<li>
  <ul class="collapsible collapsible-accordion">
        <li>
          <a  href="Logout.php" class="collapsible-header waves-effect" >Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
          <div class="collapsible-body">
              <ul>
              </ul>
          </div>
        </li>
    </ul>
</li>
</ul>