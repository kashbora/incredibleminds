<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
        Course ID:
        <select id="CID" name="cid" onchange="populateData()">
            <option>C0001</option>
            <option>C0002</option>
            <option>C0003</option>
            <option>C0004</option>
        </select>
        <br>
        

    
        Course name:<span id="courseName"></span>
        <script>
                function populateData()
                {
                    var y=document.getElementById("CID").value;

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
        
        $res1=$conn->query("select cName,cLevel from courses where cid='"+y+"'");
        $cName=$res1->fetch_assoc();
    ?>

                    document.getElementById("courseName").innerHTML=<?php echo $cName['cName'] ?> ;
                }
            </script> 
    
    
</body>
</html>