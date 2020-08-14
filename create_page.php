<?php
if(isset($_SESSION["logged-in"])){
    print_r($_SESSION["logged-in"]);
    echo '<form action="add_page.php" method="post">
        <input type="text" name="title">
        <input type="text" name="header">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submit">Create Page</button>
    </form>';
}

?>