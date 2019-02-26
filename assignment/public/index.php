<html>
    <head>
        <?php
        session_start();
            require '../helpers/scripts_style.php';
        ?>
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/materialize.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
        <script type="text/javascript" src="../assets/js/user.js"></script>
        <script>
            $(document).ready(function()
            {
                setCategory();
                getProduct();
                $('.sidenav').sidenav();
                $('.materialboxed').materialbox();
                $('.modal').modal();
                $(".dropdown-trigger").dropdown({
                    coverTrigger:false,
                    constrainWidth:false
                });
                 
                $('.collapsible').collapsible();
               
                $(".collapsible").collapsible({accordion: false});
                $("#search-input").keyup(function(event){
                    search(event,$(this).val());
                });
                $("#clear-btn").click(function()
                {
                    $("#search-input").val("");
                })
            });
        </script>
        <title>Home</title>
    </head>
    <body>
        <?php
            require_once 'navigation.php';
        ?>

        <div>
            <div class="section"></div>
            <div class="row" id="product-collection">
            </div>
            <div class="row">
                <div class="col s12 m12 l10 xl10 offset-l1 offset-xl1">
                    <div class="col center-align-div center" id="page-main-top" style="float: none; margin:0px auto;">
                    
                    </div>
                </div>
            </div>
        </div>
        <div id="modal1" class="modal">
            <div class="modal-content" >
              <div>
                <h5 class="center-align">Cart</h5>
              </div>
              <div class="divider">
              </div>
              <div id="cart-item">
              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>
    </body>
</html>
