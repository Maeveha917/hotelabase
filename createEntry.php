<?php
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];
    $fieldArray = json_decode($_GET["fieldArray"]);

    //connect to db
    $db = new SQLite3("database.db");

    /*$query = "INSERT INTO ".$table_name." WHERE ".$pkName." = ".$key.";";
    $isSuccessful = $db->exec($query);

    if ($isSuccessful){
        echo "Deleted Successfuly!";
    }else{

        echo "Error deleting entry from ".$table_name." where ".$pkName." = ".$key;
    }*/

    //close database connection
    $db->close();
?>