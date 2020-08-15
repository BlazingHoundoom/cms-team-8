<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="style2.css">
</head>
<body>

    <div >
        <?php
            if(isset($_SESSION["logged-in"])){
                // print_r($_SESSION["logged-in"]);
                if($_SESSION["logged-in"]=="admin"){
                    echo '<form class="form" action="add_page.php" method="post">
                    <br/>
                    <br/>
                    <input id="inp" type="text" placeholder="Title" name="title">
                    <br/>
                    <br/>                    
                    <input id="inp" type="text" placeholder="Header" name="header">
                    <br/>
                    <br/>                    
                    <textarea id="inp" name="content" placeholder="Description" cols="30" rows="10"></textarea>
                    <br/>
                    <br/>
                    <button id="btn" type="submit">Create Page</button>
                    </form>';
                }
            }
        ?>
    </div>
</body>
</html>



