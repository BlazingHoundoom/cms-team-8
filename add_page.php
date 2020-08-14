<?php
include 'dbConnector.php';
$ConnDB = ConnGet();
$result = AddPage($ConnDB, $_POST["title"], $_POST["header"], $_POST["content"], 0, 0);

header("Location: index.php"); /* Redirect browser, MUST occur before anything is output to page */
exit();

?>