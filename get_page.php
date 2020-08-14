<?php
    if(isset($_GET["page"])){

        $table = $_GET["page"];
        include "dbConnector.php";
        $mysqli = ConnGet();
        $query = "Select * from ".$table;
        
        $result = $mysqli->query($query);
        
        $num_results = $result->num_rows;
        if($_SESSION["admin"] == true){
            echo "<button>Edit Page</button>";
            echo "<form action='delete_page.php'><input name='page_name' type='hidden' value='".$table."'><button type='submit'>Delete Page</button></form>";
        }
        if( $num_results > 0){ 
            
            
            while( $row = $result->fetch_assoc() ){
                
                extract($row);
                
                echo "<".$tag_name." id=".$id.">".$contents."</".$tag_name.">";
            }
            
        }else{
            //if database table is empty
            
        }
        //disconnect from database
        $result->free();
        $mysqli->close();
    }
    else{

    }
        
?>