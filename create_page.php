<?php
include_once "header.php";
if(isset($_SESSION["logged-in"])){
    // print_r($_SESSION["logged-in"]);
    if($_SESSION["logged-in"]=="admin"){
        echo '<form class="create" action="add_page.php" method="post">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="header" placeholder="Header">
        <select name="parent">
        <option value=0 selected>No Parent</option>';
        $result = GetPages($ConnDB, 0);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                echo '<option value='.$row["id"].'>'.$row["Title"].'</option>';
            }
        }
        echo '</select>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Description"></textarea>
        <button type="submit">Create Page</button>
        </form>';
    }
}

?>    
</body>
</html>