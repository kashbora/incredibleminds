<!DOCTYPE html>
<html>
<head>
	<title>Student Details - Incredible Minds</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/studentdetails.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	
</head>
<body class="studbody">

        <?php
        #connection
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'im';
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        
        if(! $conn ) {
           die('Could not connect: ' . mysql_error());
        }
        #---------------------------------------------------------------------------------------
        #retreiving values from the form

        if(isset($_POST['submit'])) 
        {
	        $sid=$fname=$lname=$sEmail=$address=$city=$state=$pEmail=$dob='';
	        $pPhone=$sPhone=$pincode=0;
	        if ($_SERVER["REQUEST_METHOD"] == "POST") 
	        {
	            $sid=$_POST["sid"];
	            $fname=$_POST["fname"];
	            $lname=$_POST["lname"];
	            $dob=$_POST["dob"];
	            $sPhone=$_POST["sPhone"];
	            $pPhone=$_POST["pPhone"];
	            $sEmail=$_POST["sEmail"];
	            $pEmail=$_POST["pEmail"];
	            $address=$_POST["address"];
	            $city=$_POST["city"];
	            $state=$_POST["state"];
	            $pincode=$_POST["pincode"];
	        }
	        #-------------------------------------------------------------------------------------------
	        #inserting values into the db
	        $query="insert into student (sid,fname,lname,dob,sPhone,sEmail,address,city,state,pincode,pPhone,pEmail) values ('$sid','$fname','$lname','$dob','$sPhone','$sEmail','$address','$city','$state','$pincode','$pPhone','$pEmail') ";
	        if($conn->query($query)==TRUE)
	        {
	            header('Location: /incredibleminds/menu.php');
	            exit();
	        }
	        else
	        {
	        	 header('Location:/');
	        }
    	}
        ?>

<div class="studentheader text-center">  Student Details </div>


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

<div class="areadownstud">
	</div>



<div align="left" class="offset-lg-2"><img src="img/stdfill.png" class="bgstudent"></div>



<div class="container-fluid">
	<div class="col-lg-12">
		<div class="offset-lg-2 col-lg-8 form_student">
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
					<label for="colFormLabelName" class="col-form-label col-form-label-2">
						Student Name :
					</label>
					<div class="mob_name">
					<div class="col col-xs-7">
						<input id="" name="fname" type="text" class="form-control" placeholder="First Name" required>
					</div>
					<div class="col col-xs-7">
						<input id="" name="lname" type="text" class="form-control" placeholder="Last Name" required>
					</div>
				</div>
				</div>
					<br>
				<div class="row grid-row">
					<label for="colFormLabeldob" class="col-form-label col-form-label-2">
						Student DOB(DD-MM-YYYY) :
					</label>
					<div class="col-lg-4 col-xs-4 col-sm-4">
					<input id="" type="date" name="dob" max="31-12-3000" min="01-01-1000" class="form-control" required>
				</div>
				<label for="colFormLabelid" class="col-form-label col-form-label-2">
						Student ID :
					</label>
				<div class="col-lg-3 col-sm-3 col-xs-6">
					<input id="" type="text" name="sid" class="form-control" placeholder="Student ID" required>
				</div>

				</div>

				<br>

					<div class="row grid-row">
					<label for="colFormLabelSphno" class="col-form-label col-form-label-2">
						Student Phone Number :
					</label>
					<div class="col-lg-7 col-xs-7">
					<input id="" type="text" name="sPhone" class="form-control" placeholder="Student Phone Number" required>
				</div>
				</div>

				<br>

				<div class="row grid-row">
					<label for="colFormLabelEmail" class="col-form-label col-form-label-2">
						Student Email ID :
					</label>
					<div class="col-lg-9 col-xs-6">
					<input id="" type="email" name="sEmail" class="form-control" id="" placeholder="johndoe@abc.com" required>
				</div>
				</div>

				<br>

				<div class="row grid-row">
					<label for="colFormLabelAdd" class="col-form-label col-form-label-2">
						Student Address :
					</label>
					<div class="col-lg-5 col-xs-6">
					<input id="" type="text" name="address" class="form-control" id="" placeholder="1234 Main St" required>
				</div>
				<label for="colFormLabelcity" class="col-form-label col-form-label-2">
						City :
					</label>
				<div class="col-lg-4 col-xs-3">
					<input id="" type="text" name="city" class="form-control" id="" placeholder="City" required>
				</div>
			</div>

			<br>

			<div class="row grid-row">
				<label for="colFormLabelstate" class="col-form-label col-form-label-2">
						State :
					</label>
				<div class="col-lg-4 col-xs-6">
					<input id="" type="text" name="state" class="form-control" id="" placeholder="State" required>
				</div>
				<label for="colFormLabelpin" class="col-form-label col-form-label-2">
						Pincode :
					</label>
				<div class="col-lg-4 col-xs-6">
					<input id="" type="text" name="pincode" class="form-control" id="" placeholder="Pin-code" required=>
				</div>
			</div>

			<br>

			<div class="row grid-row">
				<label for="colFormLabelpphno" class="col-form-label col-form-label-2">
						Parent Phone Number :
					</label>
				<div class="col-lg-7">
					<input id="" type="text" name="pPhone" class="form-control" id="" placeholder="Parent Phone Number" required>
				</div>
				
			</div>

			<br>
			<div class="row grid-row">
				<label for="colFormLabelpemail" class="col-form-label col-form-label-2">
						Parent Email ID(optional) :
					</label>
				<div class="col-lg-7">
					<input id="" type="email" name="pEmail" class="form-control" id="" placeholder="Parent Email ID">
				</div>
				
			</div>

			<br>
			<button id="" type="submit" name="submit" class="btn submitbutton">Submit</button>
				

			</form>

</div>
</div>
</div>
</div>




</body>




</html>