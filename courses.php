<!DOCTYPE html>
<html>
<head>
	<title>Course Details - Incredible Minds</title>
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
		xmlhttp.open("GET","getCourseInfo.php?q="+str,true);
		xmlhttp.send();
	}
	</script>
</head>
<body class="studbody">


<div class="courseheader text-center">  Course Details </div>
<div class="area">
	<ul class="circ">
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
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="row grid-row">
					<label for="StudID" class="col-form-label col-form-label-2">
						Student ID : &nbsp; &nbsp;
					</label>
					<div class="col-lg-8 col-xs-6">
						<input id="" name="sid" type="text" value="" class="form-control" id="" placeholder="Student ID" required>
					</div>
				</div>

				<br>
				
				<div class="row grid-row">
					<label for="courseID" class="col-form-label col-form-label-2">
						Course ID : &nbsp;  &nbsp; &nbsp;
					</label>

					<div class="col-lg-8 col-xs-6">
						<select name="cid" id="cid" class="form-control" onchange="populateData(this.value)">
							<option>Select Here</option>
	                        <?php 
	                        	$dbhost = '127.0.0.1';
						        $dbuser = 'root';
						        $dbpass = '';
						        $db = 'im';
						        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
						        
						        if(! $conn ) 
						        {
						           die('Could not connect: ' . mysql_error());
						        }
	                            $res=$conn->query("select cid from courses");
	                            if($res->num_rows>0)
	                                while($row=$res->fetch_assoc())
	                                {
	                                    echo "<option>".$row["cid"]."</option>";
	                                }
	                        ?>
	                    </select>
               		</div>
                </div>
                <br>
                <span id="displayArea"></span>
				<br>
				<div class="row grid-row">
					<label for="payment" class="col-form-label col-form-label-2">
						Payment through : &nbsp;
					</label>
					
					<div class="form-check form-check-inline">
						<input id="" type="radio" name="pay" value="cash" checked class="form-check-input">
						<label class="form-check-label" for="rad1">Cash</label>
					</div>
					<div class="form-check form-check-inline">
							<input id="" type="radio" name="pay" value="online" checked class="form-check-input">
							<label class="form-check-label" for="rad1">Online</label>
					</div>
				</div>
				<br>
				<div class="row grid-row">
					<label for="StudID" class="col-form-label col-form-label-2">
						Transaction ID: &nbsp; &nbsp;
					</label>
					<div class="col-lg-8 col-xs-6">
						<input id="" name="transID" type="text" value="<?php echo "ID",time(); ?>" class="form-control" id="transID" placeholder="Transaction ID" required>
					</div>
				</div>

				<br>

				<div class="row grid-row">
					<label for="formfile">Upload</label>
					<input type="file" name="url" class="form-control-file" id="">
				</div>
				<br>


						<?php
					       if(isset($_POST['submit']))
					        {

					        $dbhost = '127.0.0.1';
					        $dbuser = 'root';
					        $dbpass = '';
					        $db = 'im';
					        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
					        
					        if(! $conn ) 
					        {
					           die('Could not connect: ' . mysql_error());
					        }
							
							$sid=$cid=$pay=$cName=$cLevel=$fid=$fName=$url=$tid='';
					        $status='pending';
					        if($_SERVER["REQUEST_METHOD"] == "POST")
					        {
					            $sid=$_POST["sid"];
					            $cid=$_POST["cid"];
					            // $cName=$_POST["cName"];
					            // $cLevel=$_POST["cLevel"];
					            $fid=$_POST["fid"];
					            // $fName=$_POST["fName"];
					            // $pay=$_POST["pay"];
					            $url=$_POST["url"];
					            $TranID=$_POST["transID"];
					        }

					        $query = mysqli_query($conn, "SELECT * FROM `student` WHERE `sid`=$sid;");
					        
					        echo "Incorrect Student ID";
					        // echo mysqli_num_rows( $query);

							if($query)
							{
								
								echo "!!;";
							}
							// if( $query || mysqli_num_rows( $query) == 1)
							else
							{
								$query1 = "insert into student_course (stud_id,course_id,faculty_id) values ('$sid','$cid','$fid') ";
						        $query2 = "insert into student_admission(stud_id,course_id,trans_id,trans_proof_url,bill_status) values('$sid','$cid',
						        		   '$TranID','demoUrl','1') ";
						        if($conn->query($query1)==TRUE && $conn->query($query2)==TRUE)
						        {
						            header('Location: /incredibleminds/blabla.html');
						            exit();
						        }
							}
					        
					    }

					    ?>
					    <br>
			<button id="" type="submit" class="btn submitbutton" name="submit">Submit</button>
				
<hr>
			</form>
</div>
</div>
</div>
</div>
</body>
</html>