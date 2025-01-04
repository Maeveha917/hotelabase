<?php  
    //TODO SANATIZE THIS
    $table_name = $_GET["name"];

    //connect to db
    $db = new SQLite3("database.db");
    //get all entries from table
    $result = $db->query("SELECT * FROM ".$table_name);
    //get amount of fields in table
    $field_amount = $result->numColumns();
    //get name(s)(for now only one primary key may work) of primary key of table
    $pkName = $db->query("SELECT l.name FROM pragma_table_info('".$table_name."') as l WHERE l.pk = 1;")->fetchArray(SQLITE3_NUM)[0];
   
    echo "<table>";
    //draw names of columns as table headings
    echo "<tr>";
        for ($i =0;$i<$field_amount;$i++){
            echo "<th>".$result->columnName($i)."</th>";
        }
    echo "</tr>";
    //draw table content corresponding to each heading, entry at a time
    while ($entry = $result->fetchArray(SQLITE3_BOTH)) {
        
        echo "<tr>";
        //print each field in each entry
        for ($i =0;$i<$field_amount;$i++){
            echo "<td contenteditable='true'>".$entry[$i]."</td>";
        }
        //edit button, upon click update database with new values. !!only if valid!!
        //delete button, with elements associated table name and id
        //TODO find better way to concat here
        echo "<td><button onclick='deleteEntry(`".$table_name."`,`".$pkName."`,`".$entry[$pkName]."`)'>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";

    //close database connection
    $db->close();
?>