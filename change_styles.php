<?php
include "header.php";


?>

<form action="change_styles" method="POST">
    <input type="radio" name="style" id="def" value="style.css">
    <label for="def">Default Style</label>
    <input type="radio" name="style" id="mint" value="style2.css">
    <label for="mint">Mint Style</label>
    <input type="radio" name="style" id="colorful" value="style3.css">
    <label for="colorful">Colorful Style</label>
    <input type="submit">
</form>

<?php
function style(){
    $_SESSION["styles"] = $_POST["style"];
    header("Location: change_styles.php"); /* Redirect browser, MUST occur before anything is output to page */
    exit();
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    style();
} 
?>