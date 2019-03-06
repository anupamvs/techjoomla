 <nav>
    <div class="nav-wrapper blue lighten-1">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <ul class="right hide-on-med-and-down">  
            <li><a href="index.php">Home</a></li>
            <li><a class="dropdown-trigger" data-target="category">Category <i class="fa fa-angle-down material-icons right" aria-hidden="true"></i></a></li>
            <?php
                if(!(isset($_SESSION["user_name"])))
                {
                echo'
                    <li><a class="dropdown-trigger" data-target="user">hi ! <i class="fa fa-angle-down material-icons right" aria-hidden="true"></i></a></li>
                    <ul id="user" class="dropdown-content">
                    <li><a href="Login.php" class="black-text">Login<i class="material-icon right-align fa fa-sign-in" aria-hidden="true"></i></a></li>
                    <li><a href="Signup.php" class="black-text">New User<i class="material-icon right-align fa fa-user-plus" aria-hidden="true"></i></a></li>
                    </ul>';
                    
                }
                else
                {
                   echo '<li><a class="dropdown-trigger" data-target="user">hi ! '.$_SESSION["user_name"].'<i class="fa fa-angle-down material-icons right" aria-hidden="true"></i></a></li>
                    <ul id="user" class="dropdown-content">
                    <li><a class="modal-trigger black-text" onclick="loadCart()" href="#modal1">Cart<i class="material-icon right-align fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li class="divider"></li>
                    <li><a href="Logout.php" class="black-text">Logout  <i class="material-icon right-align fa fa-sign-out" aria-hidden="true"></i></a></li>
                    </ul>';
                }
            ?>
            
        </ul>
        
        <ul id="category" class="dropdown-content">
        </ul>
        
        <ul class="right">
            <li>
                <div class="input-field" style="max-width: 400pt">
                    <input id="search-input" type="search" class="search-box" placeholder="Search...">
                    <label class="label-icon" for="search"><i class="fa fa-search" aria-hidden="true"></i></label>
                    <i class="fa fa-times material-icons" aria-hidden="true" id="clear-btn"></i>
                </div>
            </li>
        </ul>
    </div>
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li onclick="getProduct()"><a>Home <i class="fa fa-home material-icons" aria-hidden="true"></i></a></li>
    <ul id="side-category">
    </ul>
    
  </ul