<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$db = 'im';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

if(! $conn ) {
   die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM courses WHERE cid = '".$q."'";
$result = $conn->query($sql);

echo "<table>
<tr>
<th>cName</th>
<th>cLevel</th>
<th>cDetails</th>
</tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['cName'] . "</td>";
    echo "<td>" . $row['cLevel'] . "</td>";
    echo "<td>" . $row['cDetails'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>