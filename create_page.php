<?php
include_once "header.php";

if(isset($_SESSION["logged-in"])){
    // print_r($_SESSION["logged-in"]);
    if($_SESSION["logged-in"]=="admin"){
        echo '<form class="form" action="add_page.php" method="post">
        <input id="inp" type="text" name="title" placeholder="Title">
        <br/>
        <input id="inp" type="text" name="header" placeholder="Header">
        <br/>
        <select name="parent">
        <br/>
        <option value=0 selected>No Parent</option>';
        $result = GetPages($ConnDB, 0);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                echo '<option value='.$row["id"].'>'.$row["Title"].'</option>';
            }
        }
        echo '</select>
        <textarea id="inp" name="content" id="" cols="30" rows="10" placeholder="Description"></textarea>
        <button id="btn" type="submit">Create Page</button>
        </form>';
    }
}

?>    
</body>
</html>
