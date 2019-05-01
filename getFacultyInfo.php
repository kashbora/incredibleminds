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
$sql="SELECT * FROM faculty WHERE facultyID = '".$q."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
    echo "
    <br>
    <div class='row grid-row'>
        <label for='FacName' class='col-form-label col-form-label-2'>
            Faculty Name :
        </label>
    
        <div class='col-lg-8 col-xs-6'>
            <input id='' name='fid' type='text'  class='form-control' value='".$row['facultyName']."' />
        </div>
    </div>
    <br>
	<div class='row grid-row'>
		<label for='facultyname' class='col-form-label col-form-label-2'>
			Details :
		</label>
		<div class='col-lg-8 col-xs-6'>
			<textarea class='form-control' name='details' rows='3'>".$row['details']."</textarea> 
		</div>
	</div>
    ";
}

$query="select courses.cid as cidd,cName from courses,coursefaculty where courses.cid=coursefaculty.cid and fid='".$q."'";
$result2=$conn->query($query);
while($row2 = $result2->fetch_assoc()) 
{
    echo "
    <br>
	<div class='row grid-row'>
		<label for='courID' class='col-form-label col-form-label-2'>
			Course ID : &nbsp;  &nbsp; &nbsp;
		</label>
		<div class='col-lg-8 col-xs-6'>
			<input id='' type='text' name='cid' class='form-control' value='".$row2['cidd']."'>
		</div>
    </div>
    <br>
    <div class='row grid-row'>
		<label for='CourName' class='col-form-label col-form-label-2'>
			Course Name :
		</label>
		<div class='col-lg-8 col-xs-6'>
            <input id='' type='text' name='cName' class='form-control' value='".$row2['cName']."'>
	    </div>
	</div>
    ";
}
$conn->close();
?>
</body>
</html>