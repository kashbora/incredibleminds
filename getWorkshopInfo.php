<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = $_GET['q'];

$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$db = 'im';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

if(! $conn ) 
{
   die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM wokrshop WHERE ws_id = '".$q."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
    echo "
    <div class='row grid-row'>
        <label for='WorkshopName'  class='col-form-label col-form-label-2'>
            Workshop Name :
        </label>
        <div class='col-lg-8 col-xs-6'>
            <input id='wsName' type='text' name='wsName'  class='form-control' value='" . $row['ws_name'] . "' />
        </div>
    </div>
    <br>

    <div class='row grid-row'>
        <label for='wsDuration' class='col-form-label col-form-label-2'>
            Workshop Duration (in weeks): &nbsp; 
        </label>
        <div class='col-lg-8 col-xs-6'>
            <input id='wsDuration' type='text' name='wsDuration'  class='form-control' value='" . $row['ws_dutration'] . "' />
        </div>
    </div>
    <br>

    <div class='row grid-row'>
        <label for='wsCost' class='col-form-label col-form-label-2'>
            Workshop Cst (Rupees): &nbsp; 
        </label>
        <div class='col-lg-8 col-xs-6'>
            <input id='wsCost' type='text' name='wsCost'  class='form-control' value='" . $row['ws_cost'] . "' />
        </div>
    </div>
    ";
}

$conn->close();
?>
</body>
</html>