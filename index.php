
<?php
include_once "header.php";
?>

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
