<?php
include_once "dbConnector.php";
?>

<?php

function DisplayMenu($data) {
    $ConnDB = ConnGet();

    if($data) {
        while($row = mysqli_fetch_array($data)) {
            echo ' &nbsp; &nbsp; <a class="nav-links" href="index.php?PageID=' . $row['id'] .  '" >' . $row['Title'] . '</a>';
        }
    } else {
        echo "Can't display the menu items <br/>";
        echo mysqli_error($ConnDB);
    }
}

function DisplayPages($data_from_pages) {
    $ConnDB = ConnGet();
    if($data_from_pages) {
        $row = mysqli_fetch_array($data_from_pages);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header'] .  ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['PageText'] .  ' </p>';
    } else {
        echo "The page don't have data to display <br />";
    }
    if(isset($_SESSION["logged-in"])){
        if($_SESSION["logged-in"]=="admin"){
            $id = (isset($_GET["PageID"]))? $_GET["PageID"]: 1;
            //echo $id;
            echo '<form class="edit" action="update_page.php" method="POST">
            <input id="inp" type="hidden" name="id" value="'.$id.'"/>
            <br/>
            <input id="inp" placeholder="Title" type="text" name="title" value="'. $row['Title'].'"/>
            <br/>
            <input id="inp" placeholder="Header" type="text" name="header" value="'. $row['Header'].'"/>
            <br/>
            <select name="parent">
            <option value=0 >No Parent</option>';
        $result = GetPages($ConnDB, 0);
        $parent = $row["ParentPage"];
        if($result) {
            while($row2 = mysqli_fetch_array($result)) {
              if($row2["Title"] != $parent){
                echo '<option value='.$row2["id"].'>'.$row2["Title"].'</option>';
              }
              else {
                echo '<option value='.$row2["id"].' selected>'.$row2["Title"].'</option>';
              }
              }
        }
      echo '</select>
             <br/>
             <br/>
            <textarea placeholder="Description" name="content" cols="30" rows="10">'.$row["PageText"].'</textarea>
            <br/>
            <input id="inp" type="submit" value="Edit Page" />
            </form>';
            echo '<form action="delete_page.php" method="POST">
            <input id="inp" type="hidden" name="id" value="'.$id.'"/>
            <input id="inp" type="submit" value="Delete Page" />
            </form>';
        }
    }
}

?>