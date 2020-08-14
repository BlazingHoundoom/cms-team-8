<?php
  $table = $_POST["table"];
  $tag = $_POST["tag"];
  $contents = $_POST["contents"];
  $id = $_POST["id"];
  include "dbConnector.php";
  $mysqli = ConnGet();
  $query = "update".$table." set tag_name = '".$tag."', contents = '".$contents."' where id = ".$id;

  $mysqli->query($query);

  $mysqli->free();
  $mysqli->close();

?>
