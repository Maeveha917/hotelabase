<?php
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];
    //$fieldArray = $_GET["fieldArray"];

    
    //connect to db
    $db = new SQLite3("database.db");
    
    //echo $fieldArray;

    //close database connection
    $db->close();
?>