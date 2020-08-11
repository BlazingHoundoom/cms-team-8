<?php 

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'Content');

function ConnGet() {
    $ConnDB = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error());

    return $ConnDB;
}

function GetPages($ConnDB, $ParentPage = 0) {
    $sql = 'SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 AND ParentPage = ' . $ParentPage . ' ORDER BY ParentPage ASC, PageOrder ASC;';

    return @mysqli_query($ConnDB, $sql);
}

function GetAllPages($ConnDB) {
    $sql = 'SELECT ID, Title, Header, ParentPage, PageOrder, IsActive FROM WebDocs ORDER BY ParentPage ASC, PageOrder ASC;';

    return @mysqli_query($ConnDB, $sql);
}

function GetContentPage($ConnDB, $Id) {
    $result = null;

    $sql = "SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 AND ID = " . $Id;
    $result = @mysqli_query($ConnDB, $sql);

    if ((!$result) || ($result->num_rows < 1)){
        $sql = "SELECT ID, Title, Header FROM WebDocs WHERE IsActive = 1 ORDER BY PageOrder ASC LIMIT 1;";

        $result = @mysqli_query($ConnDB, $sql);
    }

return $result;
}

function RemovePage($ConnDB, $Id) {
    $sql = "UPDATE FROM WebDocs SET IsActive = 0 WHERE ID = " . $Id;

    return @mysqli_query($ConnDB, $sql);
}

?>