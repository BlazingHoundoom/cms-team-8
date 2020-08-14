<h1>Login Page</h1>

<?php
$admin_login_username = "admin";
$admin_login_password = "12345";

$user_login_username = "user";
$user_login_password = "67890";

$input_username = "";
$input_password = "";

if (isset($_POST['uname'])) {
    $input_username = $_POST['uname'];
}

if (isset($_POST['psw'])) {
    $input_password = $_POST['psw'];
}

if ($input_username == "" && $input_password == "") {

} else if ($input_username == $admin_login_username && $input_password == $admin_login_password) {
    echo "<h3>Admin is logged in</h3>";
    $_SESSION["logged-in"] = "admin";
} else if ($input_username == $user_login_username && $input_password == $user_login_password) {
    echo "<h3>User is logged in</h3>";
    $_SESSION["logged-in"] = "user";
} else {
    echo "<h3>Username and Password are Invalid</h3>";
}

echo "
<div>
    <form action=\"\" method=\"POST\">
        <div>
            <label for=\"uname\"><b>Username</b></label>
            <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>

            <label for=\"psw\"><b>Password</b></label>
            <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>

            <button type=\"submit\">Login</button>
        </div>
    </form>
    <p>$input_username</p>
    <p>$input_password</p>
</div>";
?>