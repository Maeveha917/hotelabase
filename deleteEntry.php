<?php
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];
    //TODO may not work with composite keys for now, fix later?
    $pkName = $_GET["pkName"];
    $key = $_GET["key"];
    
    //connect to db
    $db = new SQLite3("database.db");
    //get name(s)(for now only one primary key may work) of primary key of table
    
    //TODO only allow deletion if pk is not used as foreign key anywhere in database
    //execute query to delete item based on primary key in table
    $query = "DELETE FROM ".$table_name." WHERE ".$pkName." = ".$key.";";
    $isSuccessful = $db->exec($query);

    if ($isSuccessful){
        echo "Deleted Successfuly!";
    }else{

        echo "Error deleting entry from ".$table_name." where ".$pkName." = ".$key;
    }

    //close database connection
    $db->close();
?>