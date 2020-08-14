<?php
    session_start();
    $_SESSION["admin"] = true;
    echo "Hello There!";
    include "content.php";
?>