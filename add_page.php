<?php
//include 'dbConnector.php';
$new_table = $_POST["name"];
include "dbConnector.php";
$new_table = "About";
$mysqli = ConnGet();
//echo $mysqli->real_escape_string($_POST['name']) . '<br>';
//include database connection
//$mysqli->real_escape_string() function helps us prevent attacks such as SQL injection
$query = "Create Table ". $new_table."
    (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tag_name varchar(25) not null,
    contents varchar(255) not null,
    `order` INT not null)";
echo $query."</br>";
//execute the query
if( mysqli_query($mysqli, $query) ) {
    //if saving success
    header("Location: index.php"); /* Redirect browser, MUST occur before anything is output to page */
    exit();
}
//close database connection

$mysqli->free();
$mysqli->close();
?>