<?php  
    $table_name = $_GET["name"];

    //connect to db
    $db = new SQLite3("database.db");
    //get all items from table
    $result = $db->query("SELECT * FROM ".$table_name);

    $column_amount = $result->numColumns();

    echo "<table>";
    //draw names of columns as table headings
    echo "<tr>";
        for ($i =0;$i<$column_amount;$i++){
            echo "<th>".$result->columnName($i)."</th>";
        }
    echo "</tr>";
    //draw table content corresponding to each heading
    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        
        echo "<tr>";
        //print each item in each row
        for ($i =0;$i<$column_amount;$i++){
            echo "<td contenteditable='true'>".$row[$i]."</td>";
        }
        //edit button, upon click update database with new values. !!only if valid!!
        //delete button
        //echo "<td onclick='drawTable(`room`)'>evil evil evil</td>";
        echo "</tr>";
    }
    echo "</table>";

    //close database connection
    $db->close();
?>