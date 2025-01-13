<?php
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];
    $fieldArray = json_decode($_GET["fieldArray"]);
    $pkName = $_GET["pkName"];
    $key = $_GET["key"];

    //connect to db
    $db = new SQLite3("database.db");

    //get all column names
    $columnNames = $db->query("SELECT name from pragma_table_info('".$table_name."');");

    //construct query to update entry
    $query = "UPDATE ".$table_name." SET ";

    //treat the fields for being added to query
    for ($i = 0; $i<sizeof($fieldArray);$i++){
        if (!is_numeric($fieldArray[$i])){
            $fieldArray[$i] = "'".trim($fieldArray[$i])."'";
        }
        $fieldArray[$i] = $columnNames->fetchArray(SQLITE3_NUM)[0]." = ".$fieldArray[$i];
    }
    //add commas to seperate all entries
    $query .= implode(",",$fieldArray)." WHERE ".$pkName." = ".$key.";";

    $isSuccessful = $db->exec($query);

    if ($isSuccessful){
        echo "Updated Successfuly!";
    }else{
        echo "Error updating entry in ".$table_name." using query: \n".$query;
    }

    //close database connection
    $db->close();
?>