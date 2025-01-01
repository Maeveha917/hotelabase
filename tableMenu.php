<?php  
    //connect to db
    $db = new SQLite3("database.db");
    //get names of all tables, except any generated by sqlite
    $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE '%sqlite%' ORDER BY name;");

    //print all tables names as buttons
    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        echo "<button onclick='drawTable(`".$row[0]."`)'>".$row[0]."</button>";
    }

    //close database connection
    $db->close();
?>