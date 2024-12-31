<?php  
    $table_name = $_GET["name"];

    //connect to db
    $db = new SQLite3("database.db");
    $result = $db->query("SELECT * FROM ".$table_name);

    $column_amount = $result->numColumns();

    echo "<table>";
    //draw names of columns as table headings
    echo "<tr>";
        for ($i =0;$i<$column_amount;$i++){
            echo "<td>".$result->columnName($i)."</td>";
        }
    echo "</tr>";
    //draw table content corresponding to each heading
    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        //echo "guestID: " . $row['guestID'] . " | FName: " . $row['firstName'] . " | Lname: " .$row['lastName'] . " | telNo: " .$row['telNo'] . " | email: " .$row['email'] . " | notes: " .$row['notes'] . "<a href='editGuest.php?guestID=".$row['guestID']."''>Edit</a> " . "<a href='deleteGuest.php?guestID=".$row['guestID']."'>Delete</a>". "<br>";
        echo "<tr>";
        for ($i =0;$i<$column_amount;$i++){
            echo "<td contenteditable='true'>".$row[$i]."</td>";
        }
        echo "";
        echo "</tr>";
    }
    echo "</table>";

    //close database connection
    $db->close();
?>