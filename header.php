<?php
session_start();

include_once "dbConnector.php";
include_once "menu.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $ConnDB = ConnGet();

        // $result = GetAllPages($ConnDB);
        $result = GetPages($ConnDB, 0);

        DisplayMenu($result);
        mysqli_free_result($result);

    ?>

    &nbsp; &nbsp;<a href="login.php">Login Page</a>

</body>
</html>