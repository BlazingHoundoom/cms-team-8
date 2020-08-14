<?php
  $id = $_POST["id"];
  $title = $_POST["title"];
  $header = $_POST["header"];
  $content = $_POST["content"];
  // if(isset($_SESSION["logged-in"])){
  //   print_r($_SESSION["logged-in"]);
  echo '<form action="update_page.php" method="post">
  <input type="hidden" name="id" value="'.$id.'">
  <input type="text" name="title" value="'.$title.'">
  <input type="text" name="header" value="'.$header.'">
  <textarea name="content" id="" cols="30" rows="10">'.$content.'</textarea>
  <input type="submit" name="submit" value="Update Page"/>
</form>';
?>
