<?php
  $id = $_POST["id"];
  $title = $_POST["title"];
  $header = $_POST["header"];
  $content = $_POST["content"];
  $parent = $_POST["parent"];
  if(isset($_SESSION["logged-in"])){
    print_r($_SESSION["logged-in"]);
    if($_SESSION["logged-in"]=="admin"){
      echo '<form action="update_page.php" method="post">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="text" name="title" value="'.$title.'">
      <input type="text" name="header" value="'.$header.'">
      <select name="parent">';
        $result = GetPages($ConnDB, 0);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
              if($row["Title"] != $parent){
                echo '<option value='.$row["id"].'>'.$row["Title"].'</option>';
              }
              else {
                echo '<option value='.$row["id"].' selected>'.$row["Title"].'</option>';
              }
              }
        }
      echo '</select>
      <textarea name="content" id="" cols="30" rows="10">'.$content.'</textarea>
      <input type="submit" name="submit" value="Update Page"/>
      </form>';
    }
  }
?>
