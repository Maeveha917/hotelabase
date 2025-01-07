<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelabase</title>
</head>

<?php
    include("tableMenu.php");           
?>

<body>
    <div id="table menu"></div>
    <div id="table">Click any of the above buttons to display table contents</div>
</body>

<script>
//takes an arbitrary tables name, and draws it
function drawTable(tableName) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("table").innerHTML = this.responseText;
    }
    xhttp.open("GET", "drawTable.php?name="+tableName);
    xhttp.send();
}
//deletes an entry from any given table, with the use of the corrosponding primary key
function deleteEntry(tableName,pkName,key){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        alert(this.responseText);
    }
    xhttp.open("GET", "deleteEntry.php?name="+tableName+"&pkName="+pkName+"&key="+key);
    xhttp.send();
}
//adds new entry to specified table
function createEntry(tableName,fieldArray){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        alert(this.responseText);
    }
    xhttp.open("GET", "createEntry.php?name="+tableName+"&fieldArray="+fieldArray);
    xhttp.send();
}

</script>
</html>