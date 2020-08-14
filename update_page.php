<?php
include 'header.php';
$result = UpdatePage($ConnDB,$_POST["id"], $_POST["title"], $_POST["header"], $_POST["content"], 0, 0);
//$row = $result->fetch_assoc();

//echo $row;
header("Location: index.php/?PageID=".$_POST["id"]); /* Redirect browser, MUST occur before anything is output to page */
exit();

?>