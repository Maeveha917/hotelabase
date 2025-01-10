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
   
    echo "<table> <thead>";
    //draw names of columns as table headings
    echo "<tr>";
        for ($i =0;$i<$field_amount;$i++){
            echo "<th>".$result->columnName($i)."</th>";
        }
    echo "</tr> </thead> <tbody>";
    
    //draw table content corresponding to each heading, entry at a time
    while ($entry = $result->fetchArray(SQLITE3_BOTH)) {
        
        echo "<tr>";
        //print each field in each entry
        for ($i =0;$i<$field_amount;$i++){
            echo "<td contenteditable='true'>".$entry[$i]."</td>";
        }
        //edit button, upon click update database with new values. !!only if valid!!
        echo "<td><button>Update</button></td>";
        //delete button, with elements associated table name and id
        //TODO find better way to concat here
        echo "<td><button onclick='deleteEntry(`".$table_name."`,`".$pkName."`,`".$entry[$pkName]."`)'>Delete</button></td>";
        echo "</tr>";
    }
    //text entry for creation of new item
    echo "<tr>";
        echo "<div id='createEntryInput'>";
        //echo "<input type = 'text' input'/>";
        for ($i =0;$i<$field_amount;$i++){
            //text input for each field in table
            echo "<td><input type = 'text' placeholder = '".$result->columnName($i)."' id='newField".$i."'/></td>";
        }
        echo "<th><button type='submit' onclick='createEntry(`guest`)'>Create New</button></th>";
        echo "</div>";
    echo "</tr>";
    echo "</tbody></table>";

    //close database connection
    $db->close();
?>