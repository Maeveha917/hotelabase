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
        xhttp.onload = function() {drawTable(tableName);
            alert(this.responseText);
            drawTable(tableName);
        }
        xhttp.open("GET", "deleteEntry.php?name="+tableName+"&pkName="+pkName+"&key="+key);
        xhttp.send();
    }
    //adds new entry to specified table
    function createNewEntry(tableName){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
            drawTable(tableName);
        }
        xhttp.open("GET", "createEntry.php?name="+tableName+"&fieldArray="+JSON.stringify(getTagContents("newField")));
        xhttp.send(); 
    }
    //updates the contents of a specified entry
    function updateEntry(tableName, pkName,key){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
            drawTable(tableName);
        }
        console.log(getTagContents("field"+key,false));
        xhttp.open("GET", "updateEntry.php?name="+tableName+"&fieldArray="+JSON.stringify(getTagContents("field"+key,false))+"&pkName="+pkName+"&key="+key);
        xhttp.send(); 
    }
    //retrives the contents of tags with a common start of their id followed by a number
    function getTagContents(idPrefix, isInput = true){
        let contentArray = [];
        let elementPresent = true;
        let elementNo = 0;
        //keep pushing element contents to the array while there are elements with the specified ids
        do{
            //gets element at corrosponding id while iterating to next
            let element = document.getElementById(idPrefix+elementNo++);
            if (element){
                //when dealing with input --> value, when regular html, innertext
                if(isInput){
                    contentArray.push(element.value);
                }else{
                    contentArray.push(element.innerText);
                }
                
            }else{
                elementPresent = false;
            }
        }while(elementPresent);
        return contentArray;
    }
    </script>
</body>
</html>