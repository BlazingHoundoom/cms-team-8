<?php
    //Getting id of page to delete;
    $table = $_GET["page_name"];
    //Including the DB connection to be able to delete the page;
    include 'dbConnector.php';
    $mysqli = ConnGet();
    $query = "DROP TABLE ".$table;
    // Actually querying the DB
    if( $mysqli->query($query) ) {   
        header("Location: index.php/");
        exit();
    }else {
    echo "Database Error: Unable to delete page.";    
    }

    $mysqli->free();
    $mysqli->close();
?>