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

function GetPages($ConnDB, $ParentPage=0) {

    $sql = 'SELECT id, Title, Header, PageText FROM WebDocs where IsActive = 1 and ParentPage = ' . $ParentPage . ' order by ParentPage asc, PageOrder Asc;';


    return @mysqli_query($ConnDB, $sql);
}

function GetAllPages($ConnDB) {

    $sql = 'SELECT id, Title, Header, PageText, ParentPage, PageOrder, IsActive FROM WebDocs order by ParentPage asc, PageOrder Asc;';

    return @mysqli_query($ConnDB, $sql);
}

function GetContentPage($ConnDB, $Id) {
    $result = null;


    $sql = "SELECT id, Title, Header, PageText FROM WebDocs where IsActive = 1 and id = " . $Id;
    $result = @mysqli_query($ConnDB, $sql);

    if ((!$result) || ($result->num_rows < 1)){
        $sql = "SELECT id, Title, Header, PageText FROM WebDocs where IsActive = 1 order by PageOrder asc limit 1;";

        $result = @mysqli_query($ConnDB, $sql);
    }

return $result;
}

function RemovePage($ConnDB, $Id) {
    $sql = "update from WebDocs set IsActive = 0 where id = " . $Id;

    return @mysqli_query($ConnDB, $sql);
}

function AddPage($ConnDB, $Title, $Header, $PageText, $ParentPage=0, $PageOrder=0){
    $sql = "Insert into webdocs (Title, Header, PageText, ParentPage, PageOrder, IsActive) values ('".$Title."', '".$Header."', '".$PageText."', ".$ParentPage.", ".$PageOrder.", 1)";

    return @mysqli_query($ConnDB, $sql);
}

function UpdatePage($ConnDB, $Id, $Title, $Header, $PageText, $ParentPage=0, $PageOrder=0){
    $sql = "Update webdocs set Title='".$Title."', Header='".$Header."', PageText='".$PageText."', ParentPage=".$ParentPage.", PageOrder=".$PageOrder.", IsActive=1 where id=".$Id;

    return @mysqli_query($ConnDB, $sql);
}

function DeletePage($ConnDB, $Id){
    $sql = "delete from WebDocs where id = " . $Id;

    return @mysqli_query($ConnDB, $sql);
}

?>