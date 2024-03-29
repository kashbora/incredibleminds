<!DOCTYPE html>
<html>
<head>
	<title>Login to Incredible Minds</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
    
    
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

    <button type="submit" class="btn" id="" name="loginButton">Login</button>

    <?php
        #connection and retrieving admin info
        if(isset($_POST['loginButton'])) 
        {
            ob_start();
            session_start();
            //Login button was pressed
            $username = $_POST['email'];
            $password = $_POST['psw'];

            $con = mysqli_connect("localhost", "root", "", "im");
        


            // $result = $account->login($username, $password);
            $pw = md5($password);
            // echo $password,"<br>";
            // echo $pw;

            $res=mysqli_query($con,"SELECT * FROM `login` WHERE `email`= $username AND`password`=$pw;");
            if(!$res)
            {
                
                echo "login done successfully";
                $_SESSION['userLoggedIn'] = "$username";
                header('Location: /incredibleminds/menu.php');
            }
            else 
            {
                echo "fail login";
            }

            
        }
    ?>
    
     <footer id="" class="login_footer"><a href="#" id="psw_reset">Forgot your password?</a></footer>
  </form>
	</div>
</div>
</div>

</body>
</html>
