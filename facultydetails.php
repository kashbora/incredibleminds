<!DOCTYPE html>
<html>
<head>
	<title>Faculty Details - Incredible Minds</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/studentdetails.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script>
		function populateData(str) 
		{
			if (str=="") 
			{
				document.getElementById("displayArea").innerHTML="";
				return;
			} 
			if (window.XMLHttpRequest) 
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} 
			else 
			{ // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() 
			{
				if (this.readyState==4 && this.status==200) 
				{
					document.getElementById("displayArea").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","getFacultyInfo.php?q="+str,true);
			xmlhttp.send();
		}
		</script>
</head>
<body class="studbody">
        <?php
        #connection and retrieving admin info
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'im';
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        
        if(! $conn ) {
           die('Could not connect: ' . mysql_error());
        }
        #---------------------------------------------------------------------------------------

        $cid=$cName=$fid=$fName=$details='';
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $fid=$_POST["fid"];
            $fName=$_POST["fName"];
            $details=$_POST["details"];
            $cName=$_POST["cName"];
            $cid=$_POST["cid"];

        }
        
    ?>
<div class="courseheader text-center">  Faculty Details </div>


<div class="area">
	<ul class="circ">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

<div class="areadowncourse">
	</div>



<div align="left" class="offset-lg-3"><img src="img/stdfill.png" class="bgcourse"></div>



<div class="container-fluid">
	<div class="col-lg-12">
		<div class="offset-lg-4 col-lg-4 form_course">
<div class="container-fluid">

	<!--LOADER AT WORK
<div class="ring">
	Loading
	<span></span>
</div>
</div>-->

			<br>
			<form>
				<div class="row grid-row">
					<label for="FacID" class="col-form-label col-form-label-2">
						Faculty ID : &nbsp; &nbsp;
					</label>
					<div class="col-lg-8 col-xs-6">
                            <select name="fid" id="fid" class="form-control" onchange="populateData(this.value)">
                                    <?php 
                                        $res=$conn->query("select facultyID from faculty");
                                        if($res->num_rows>0)
                                            while($row=$res->fetch_assoc())
                                            {
                                                echo "<option>".$row["facultyID"]."</option>";
                                            }
                                    ?>
                                </select>
				</div>
				</div>
                <span id="displayArea"></span>
                <br>
                
				<!-- <br>
				<div class="row grid-row">
					<label for="courseID" class="col-form-label col-form-label-2">
					 Skills : &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					</label>
					<div class="col-lg-8 col-xs-6">
					<input id="" type="text"  class="form-control" id="" placeholder="Skills" required>
				
				</div>
			</div>
			<br> -->
				<br>
				<br>
			<button id="" type="submit" class="btn submitbutton">Done</button>
				
<hr>
			</form>

</div>
</div>
</div>
</div>




</body>




</html>