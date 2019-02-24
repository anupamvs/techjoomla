<html>
    <head>
        <?php
            //require 'helpers/scripts_style.php';
        ?>
        <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/materialize.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script type="text/javascript" src="assets/js/user.js"></script>
        <script>
            $(document).ready(function()
            {
                $('.sidenav').sidenav();
            });
        </script>
    </head>
    <body>
        <?php
	//phpinfo();
        require_once 'navigation.php';
        ?>
    </body>
</html>
