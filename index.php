
<?php
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"  href="Style3.css">
</head>
<body>

    <div class="content">
        <?php

            $PageID = "0";

            if(array_key_exists("PageID", $_GET) == true) {
                $PageID = $_GET["PageID"];
            }
        ?>

        <?php 

            $pages_data = GetContentPage($ConnDB, $PageID);
            DisplayPages($pages_data);
            mysqli_free_result($pages_data);


            $sub_pages = GetPages($ConnDB, $PageID);
            if(($PageID != "0") && ($sub_pages) && ($sub_pages->num_rows > 0)) {
                DisplayMenu($sub_pages);
                mysqli_free_result($sub_pages);
            } 

            mysqli_close($ConnDB);
        ?>

    </div>
</body>
</html>

<?php 
require 'create_page.php';
?>
