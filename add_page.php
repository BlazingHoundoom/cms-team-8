<?php
include 'dbConnector.php';
$ConnDB = ConnGet();
$result = AddPage($ConnDB, $ConnDB->real_escape_string($_POST["title"]), $ConnDB->real_escape_string($_POST["header"]), $ConnDB->real_escape_string($_POST["content"]), $ConnDB->real_escape_string($_POST["parent"]), 0);

header("Location: index.php"); /* Redirect browser, MUST occur before anything is output to page */
exit();

?>