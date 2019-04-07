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
$sql="SELECT * FROM courses WHERE cid = '".$q."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
    echo "
    <div class='row grid-row'>
        <label for='CourseName'  class='col-form-label col-form-label-2'>
            Course Name :
        </label>
        <div class='col-lg-8 col-xs-6'>
            <input id='courseName' type='text' name='cName'  class='form-control' value='" . $row['cName'] . "' />
        </div>
    </div>
    <br>

    <div class='row grid-row'>
        <label for='Courselev' class='col-form-label col-form-label-2'>
            Course Level: &nbsp; 
        </label>
        <div class='col-lg-8 col-xs-6'>
            <input id='courseLevel' type='text' name='cLevel'  class='form-control' value='" . $row['cLevel'] . "' />
        </div>
    </div>
    ";
}

$query="select facultyID,facultyName from faculty,coursefaculty where coursefaculty.fid=faculty.facultyID and cid='".$q."'";
$result2=$conn->query($query);
while($row2 = $result2->fetch_assoc()) 
{
    echo "
		<br>
		<div class='row grid-row'>
			<label for='Faculty' class='col-form-label col-form-label-2'>
				Faculty ID: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			</label>
            <div class='col-lg-8 col-xs-6'>
				<input id='facultyID' type='text' name='fid' class='form-control'  placeholder='Faculty ID' value='".$row2['facultyID']."' />
			</div>
		</div>
		<br>
		<div class='row grid-row'>
			<label for='facultyname' class='col-form-label col-form-label-2'>
				Faculty Name :
			</label>
		    <div class='col-lg-8 col-xs-6'>
			    <input id='facultyName' type='text' name='fName' class='form-control' placeholder='Faculty Name' value='".$row2['facultyName']."'>
		    </div>
        </div>
    ";
}
$conn->close();
?>
</body>
</html>