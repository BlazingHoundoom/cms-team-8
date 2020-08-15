<?php
include 'header.php';
$result = UpdatePage($ConnDB, $ConnDB->real_escape_string($_POST["id"]), $ConnDB->real_escape_string($_POST["title"]), $ConnDB->real_escape_string($_POST["header"]), $ConnDB->real_escape_string($_POST["content"]), $ConnDB->real_escape_string($_POST["parent"]), 0);
//$row = $result->fetch_assoc();

//echo $row;
header("Location: index.php?PageID=".$_POST["id"]); /* Redirect browser, MUST occur before anything is output to page */
exit();

?>