<!DOCTYPE html>
<html>
  <head>
    <title>Workshop Details - Incredible Minds</title>
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
      xmlhttp.open("GET","getWorkshopInfo.php?q="+str,true);
      xmlhttp.send();
    }
    </script>
  </head>
<body class="studbody">


  <div class="courseheader text-center">  Workshop Details </div>
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
              Workshop ID : &nbsp;  &nbsp; &nbsp;
            </label>
  
            <div class="col-lg-8 col-xs-6">
              <select name="ws_id" id="ws_id" class="form-control" onchange="populateData(this.value)">
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
                                $res=$conn->query("select ws_id from wokrshop");
                                if($res->num_rows>0)
                                    while($row=$res->fetch_assoc())
                                    {
                                        echo "<option>".$row["ws_id"]."</option>";
                                    }
                            ?>
                        </select>
                     </div>
                  </div>
                  <br>
                  <span id="displayArea"></span>
          <br>
          
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
                
                $sid=$ws_id='';
                    $status='pending';
                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        $sid=$_POST["sid"];
                        $ws_id=$_POST["ws_id"];
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
                  $query1 = "insert into student_workshop (sid,ws_id) values ('$sid','$ws_id') ";
                      if($conn->query($query1)==TRUE)
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
