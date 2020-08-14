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
        echo ' &nbsp; &nbsp; <p> ' . $row['PageText'] .  ' </p> <br />';
    } else {
        echo "The page don't have data to display <br />";
    }
    $id = (isset($_GET["PageID"]))? $_GET["PageID"]: 1;
    //echo $id;
    echo '<form action="update_page.php" method="POST">
            <input type="hidden" name="id" value="'.$id.'"/>
            <input type="text" name="header" value="'. $row['Header'].'"/>
            <input type="text" name="title" value="'. $row['Title'].'"/>
            <textarea name="content">'.$row["PageText"].'</textarea>
            <input type="submit" value="Edit Page" />
        </form>';
}

?>