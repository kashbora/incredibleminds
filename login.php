<!DOCTYPE html>
<html>
<head>
	<title>Login to Incredible Minds</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
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
        
        $query='select email,password from login';
        $result=$conn->query($query);
        
        $row = $result->fetch_assoc();
        $conn->close();
        #---------------------------------------------------------------------------------------
        #retreiving values from the form
        $emailErr=$pswErr='';
        $email=$psw='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["email"])) 
            {
                $emailErr = "Email is required";
            }
            else
            {
                $email = test_input($_POST["email"]);
                
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                   $emailErr = "Invalid email format"; 
                }
            }
            if (empty($_POST["psw"])) 
            {
                $pswErr = "Password is required";
            }
            else 
            {
                $psw = test_input($_POST["psw"]);
            }
            #test for match of admin email and password. If matched, then redirects to the next page.
            if ($email == $row["email"] && $psw == $row["password"])
            {
                header('Location: /incredibleminds/studentdetails.php');
                exit();
            }
            else
            {
                print("<h2 style='color:grey;'>wrong password or email ID</h2>");
            }
        }

        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        
    ?>
    
	<div id="bgeff">
		<script type="text/javascript" src="js/particles.js">
</script>
	
<script type="text/javascript" src="js/bgeffect.js">
</script>

<div class="part"></div>
<div class="col-lg-12 login_form">
	<div class="offset-lg-2 col-lg-4 col-xs-4">
		<!--DUMMY LOGO-->
		<img class="login_logo" src="img/adv.png">
	</div>
	<div class="vl">
	</div>

	<div class="offset-lg-1 col-lg-5 col-xs-6">
<div class="box-outer">
<div class="bar top"></div>
<div class="bar right delay"></div>
<div class="bar bottom delay"></div>
<div class="bar left"></div>
</div>


		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="container col-xs-8" id="">
			
    <h1 class="h1_login">Login</h1>
    <!--EMAIL-->
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
    		<span class="input-group-text"><img class="login_icons" src="img/emailicon.png"></span>
    	</div>
        <input type="text" placeholder="Enter Email" name="email" required id="">
	</div>
	<!--PSW-->
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
    		<span class="input-group-text"><img class="login_icons" src="img/pswicon.png"></span>
    	</div>
    <input type="password" placeholder="Enter Password" name="psw" required id="">
	</div>

    <button type="submit" class="btn" id="">Login</button>
    
     <footer id="" class="login_footer"><a href="#" id="psw_reset">Forgot your password?</a></footer>
  </form>
	</div>
</div>
</div>

</body>
</html>
