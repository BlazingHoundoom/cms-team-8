<?php
include_once "header.php";
if(isset($_SESSION["logged-in"])){
    if($_SESSION["logged-in"]=="admin"){
        echo '<form action="add_page.php" method="post">
        <input type="text" name="title">
        <input type="text" name="header">
        <select name="parent">';
        $result = GetPages($ConnDB, 0);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                echo '<option value='.$row["id"].'>'.$row["Title"].'</option>';
            }
        }
        echo '</select>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submit">Create Page</button>
        </form>';
    }
}

?>    
</body>
</html>