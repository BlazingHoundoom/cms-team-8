<?php
include_once "dbConnector.php";
?>

<?php

function DisplayMenu($data) {
    $ConnDB = ConnGet();

    if($data) {
        while($row = mysqli_fetch_array($data)) {
            echo ' &nbsp; &nbsp; <a href="index.php?PageID=' . $row['id'] .  '" >' . $row['Title'] . '</a>';
        }
    } else {
        echo "Can't display the menu items <br/>";
        echo mysqli_error($ConnDB);
    }
}

function DisplayPages($data_from_pages) {
    
    if($data_from_pages) {
        $row = mysqli_fetch_array($data_from_pages);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header'] .  ' </h2> <br />';
    } else {
        echo "The page don't have data to display <br />";
    }
}

?>