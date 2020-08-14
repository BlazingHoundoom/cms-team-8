<?php
include 'dbConnector.php';
$ConnDB = ConnGet();
$result = DeletePage($ConnDB,$_POST["id"]);

header("Location: index.php"); /* Redirect browser, MUST occur before anything is output to page */
exit();
?>