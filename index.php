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
    <div id="table"></div>
</body>

<script>
function drawTable(name) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("table").innerHTML = this.responseText;
    }
    xhttp.open("GET", "drawTable.php?name="+name);
    xhttp.send();
}

</script>
</html>