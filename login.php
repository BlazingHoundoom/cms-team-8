<?php

include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"  href="Style.css">
</head>
<body>
    <h1 id="login">Login Page</h1>

    <?php
        //session_start();

        $admin_1_username = @mysqli_query(ConnGet(), 'SELECT UName FROM users where id=1');
        $admin_1_password = @mysqli_query(ConnGet(), 'SELECT Pswd FROM users where id=1');

        $admin_2_username = @mysqli_query(ConnGet(), 'SELECT UName FROM users where id=2');
        $admin_2_password = @mysqli_query(ConnGet(), 'SELECT Pswd FROM users where id=2');

        $admin_3_username = @mysqli_query(ConnGet(), 'SELECT UName FROM users where id=3');
        $admin_3_password = @mysqli_query(ConnGet(), 'SELECT Pswd FROM users where id=3');

        $user_4_username = @mysqli_query(ConnGet(), 'SELECT UName FROM users where id=4');
        $user_4_password = @mysqli_query(ConnGet(), 'SELECT Pswd FROM users where id=4');

        $val1;
        $val2;
        $val3;
        $val4;
        $val5;
        $val6;
        $val7;
        $val8;

        while ($row = $admin_1_username->fetch_assoc()) {
            $val1 = $row["UName"];
        }
        while ($row = $admin_1_password->fetch_assoc()) {
            $val2 = $row["Pswd"];
        }
        while ($row = $admin_2_username->fetch_assoc()) {
            $val3 = $row["UName"];
        }
        while ($row = $admin_2_password->fetch_assoc()) {
            $val4 = $row["Pswd"];
        }
        while ($row = $admin_3_username->fetch_assoc()) {
            $val5 = $row["UName"];
        }
        while ($row = $admin_3_password->fetch_assoc()) {
            $val6 = $row["Pswd"];
        }
        while ($row = $user_4_username->fetch_assoc()) {
            $val7 = $row["UName"];
        }
        while ($row = $user_4_password->fetch_assoc()) {
            $val8 = $row["Pswd"];
        }

        $input_username = "";
        $input_password = "";

        if (isset($_POST['uname'])) {
            $input_username = $_POST['uname'];
        }

        if (isset($_POST['psw'])) {
            $input_password = $_POST['psw'];
        }

        if ($input_username === "" && $input_password === "") {
            // echo "<h3>Nothing</h3>";
        } else if (strcmp($val1, $input_username) === 0 && strcmp($val2, $input_password) === 0) {
            echo '<h3>Admin wesmon is logged in</h3>';
            $_SESSION["logged-in"] = "admin";
        } else if (strcmp($val3, $input_username) === 0 && strcmp($val4, $input_password) === 0) {
            echo '<h3>Admin matguer is logged in</h3>';
            $_SESSION["logged-in"] = "admin";
        } else if (strcmp($val5, $input_username) === 0 && strcmp($val6, $input_password) === 0) {
            echo '<h3>Admin CisHer is logged in</h3>';
            $_SESSION["logged-in"] = "admin";
        } else if (strcmp($val7, $input_username) === 0 && strcmp($val8, $input_password) === 0) {
            echo '<h3>User manny is logged in</h3>';
            $_SESSION["logged-in"] = "user";
        } else {
            echo "<h3>Username and Password are Invalid</h3>";
        }
        // print_r($_SESSION['logged-in']);

        echo "
        <div class='form'>
            <form action=\"\" method=\"POST\">
                <div>
                    <label for=\"uname\"><b>Username</b></label>
                    <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>
                    <br/>
                    <br/>
                    <label for=\"psw\"><b>Password</b></label>
                    <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>
                    <br/>
                    <button type=\"submit\">Login</button>
                </div>
            </form>
        </div>";
    ?>
</body>
</html>

