<?php
	// echo "Login was successful";
	// echo "<br>";
	// session_start();
	// session_destroy(); 
	// if(isset($_SESSION['userLoggedIn'])) 
	// {
	// 	$userLoggedIn = $_SESSION['userLoggedIn'];
	// 	echo "You are: ",$userLoggedIn;

	// }
	// else
	// {
	// 	// route back user to the registration page
	// 	echo "You are not authorised","<br>","PLEASE LOGIN";
	// }

	// $con = mysqli_connect("localhost", "root", "", "im");



?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Incredible Minds</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
<div id="bgeff2">
		<script type="text/javascript" src="js/particles.js">
</script>
	
<script type="text/javascript" src="js/bgeffect2.js">
</script>

<div class="col-lg-12 contentnav">
	<div class="offset-lg-1" style="display: flex;">
		<img src="img/admin.png" class="rounded-circle" height="100px" width="100px">
		<h2 class="userhell">Hello, User!</h2>
	</div>
	<br>
	
	<div class="wheel">
		<div class="offset-lg-11 studnav">
		<a href="studentdetails.php">
		<img src="img/studnav.png" width="344.4px" height="203px">
	</a>
	</div>
	<div class="offset-lg-4 adwork">
		<a href="admissiondet.html"><img src="img/adnav.png" width="344.4px" height="203px"></a>
		<a href="workshop.php"><img class="worknav" src="img/worknav.png" width="344.4px" height="203px"></a>
</div>
<div class="coufac offset-lg-4">
	<a href="facultydetails.php" ><img src="img/facnav.png" width="344.4px" height="203px"></a>
		<a href="courses.php"><img class="coursenav" src="img/coursenav.png" width="344.4px" height="203px"></a>

</div>
</body>
</html>