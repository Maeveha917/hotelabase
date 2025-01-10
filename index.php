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
    function createNewEntry(tableName){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
        }
        xhttp.open("GET", "createEntry.php?name="+tableName+"&fieldArray="+JSON.stringify(getTagContents("newField")));
        xhttp.send(); 
    }
    //retrives the contents of tags with a common start of their id followed by a number
    function getTagContents(idPrefix){
        let contentArray = [];
        let elementPresent = true;
        let elementNo = 0;
        //keep pushing element contents to the array while there are elements with the specified ids
        do{
            //gets element at corrosponding id while iterating to next
            let element = document.getElementById(idPrefix+elementNo++);
            if (element){
                contentArray.push(element.value);
            }else{
                elementPresent = false;
            }
        }while(elementPresent);
        return contentArray;
    }
    </script>
</body>
</html>