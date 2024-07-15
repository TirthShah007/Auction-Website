<?php
session_start();
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF=8">
        <title>

        </title>
    </head>
    <body>
        <?php
        session_destroy();
        header("location:http://localhost/project/visitor/login.php");
        exit();
        ?>
        </body>
</html>