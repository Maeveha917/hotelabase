<?php
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];
    $fieldArray = json_decode($_GET["fieldArray"]);

    //connect to db
    $db = new SQLite3("database.db");

    //construct query to create new entry
    $query = "INSERT INTO ".$table_name." Values (";

    //treat the fields such that they can be inserted into the database as text if need be
    for ($i = 0; $i<sizeof($fieldArray);$i++){
        if (!is_numeric($fieldArray[$i])){
            $fieldArray[$i] = "'".$fieldArray[$i]."'";
        }
    }
    //add commas to seperate all entries
    $query .= implode(",",$fieldArray).");";

    $isSuccessful = $db->exec($query);

    if ($isSuccessful){
        echo "Created Successfuly!";
    }else{

        echo "Error creating new entry in ".$table_name;
    }

    //close database connection
    $db->close();
?>