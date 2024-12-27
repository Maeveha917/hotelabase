<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelabase</title>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="">
    <h1 onclick="getTableData('test',100,100)">This is a Heading do not click</h1>
    <p>This is a paragraph.</p>
    <p>This is another paragraph.</p>
    </div>

    <div id="table">
    </div>
</body>

<script>
function getTableData(name,itemsPerPage,pageNo) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("table").innerHTML = this.responseText;
    }
    xhttp.open("GET", "test.php?name="+name);
    xhttp.send();
}
</script>
</html>