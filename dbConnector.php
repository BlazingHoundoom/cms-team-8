<?php 

DEFINE ('DB_USER', 'root');
DEFINE ('DB-PSWD', '');
DEFINE ('DV_SERVER', 'localhost');
DEFINE ('DB_NAME', 'Content');

function ConnGet() {
    $ConnDB = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $ConnDB;
}

function GetPage($ConnDB, $ParentPage = 0) {
    $sql = 'SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 AND ParentPage = ' . $ParentPage . ' order by ParentPage asc, Order Asc;';

    return @mysqli_query($ConnDB, $ParentPage);
}

function GetAllPages($ConnDB) {
    $sql = 'SELECT ID, Title, Header, ParentPage, Order, IsActive FROM WebDocs ORDER BY ParentPage ASC, Order ASC;';

    return @mysqli_query($ConnDB, $sql);
}

function GetContentPage($ConnDB, $Id) {
    $result = null;

    $sql = "SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 AND ID = " . $Id;
    $result = @mysqli_query($ConnDB, $sql);

    if ((!$result) || ($result->num_of_rows < 1)){
        $sql = "SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 ORDER BY Order ASC LIMIT 1;";

        $result = @mysqli_query($ConnDB, $sql);
    }

return $result;
}

function RemovePage($ConnDB, $Id) {
    $sql = "UPDATE FROM WebDocs SET IsActive = 0 WHERE ID = " . $Id;

    return @mysqli_query($ConnDB, $sql);
}

?>