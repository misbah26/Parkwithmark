<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Departure Reciept</title>
</head>

<body id="page1">

<header>
    	<div class="row-1">
        	<div class="main">
            	<div class="container_12">
                	<div class="grid_12">
                    	<nav>
                            <ul class="menu">
                            	<li><a href="home.html">Home</a></li>
                                <li><a href="Arrival.html">Arrival</a></li>
                                <li><a class="active" href="Departure.html">Departure</a></li>
                                <li><a href="Record.php">Record</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                </div>
        </div>
         <div class="row-2">
         	<div class="main">
            	<div class="container_12">
                	<div class="grid_9">
                    	<h1>
                            <a class="logo" href="home.html">Pa<strong>R</strong>k</a>
                            <span>With Mark</span>
                        </h1>
                    </div> 
                    
                     <div class="clear"></div>
                </div>
            </div>
        </div>    	
    </header>


<div id="content">
<div class="bg-top">
<div class="bg-top-2">
<div class="bg">
<div class="bg-top-shadow">
<div class="main">
<div class="box">
<div class="padding">
<div class="container_12">
<div class="wrapper">
<div class="grid_12">
<div class="indent-left">
<h3 class="p2">Departure Reciept</h3>


<?php

$dept= $_GET["departure"];
$acod= $_GET["code1"];
$servername = "localhost";
$username = "username";
$password = "password";
$dbname="weproject";
$conn1 = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn1)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
  
  $sql = "UPDATE arrive_reciept SET departure = ('$dept') 
               WHERE code = ('$acod')" ;


if (!mysqli_query($conn1,$sql))
  {
  die('Error: ' . mysqli_error($conn1));
  }
  
$sql1 = "SELECT code,numberplate,color,arrivaltime,departure,vehicletype,charges FROM arrive_reciept WHERE code IN('$acod') ";
$result = mysqli_query($conn1, $sql1);
  
  
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {?>
  
 
<form id="contact-form">
<fieldset>

<label><span class="text-form">Code Assign:</span><span class="text-form2"><?php echo $row["code"];?></span></label>
<label><span class="text-form">Arrival Time:</span><span class="text-form2"><?php echo $row["arrivaltime"]; ?></span></label>
<label><span class="text-form">Departure Time:</span><span class="text-form2"><?php echo $row["departure"]; ?></span></label>
<label><span class="text-form">Number Plate</span><span class="text-form2"><?php echo $row["numberplate"];?></span></label>
<label><span class="text-form">Vehicle Type:</span><span class="text-form2"><?php echo $row["vehicletype"]; ?></span></label>
<label><span class="text-form">Color:</span><span class="text-form2"><button type="button" disabled style="background-color:<?php echo $row["color"];?>; width:120px; height:30px"></button></span></label>
<label><span class="text-form">Charges:</span><span class="text-form2"><?php echo $row["charges"]; ?></span></label>
<label><span class="text-form2">Thanks For Coming!</span></label>


<?php 
}}
else
{
  echo "<p>0 results<p>";
}  
  
  $delsql = "DELETE FROM arrive_reciept WHERE code='" . $_GET["code1"] . "'";
if (!mysqli_query($conn1, $delsql)){}
     
?>

<div class="buttons">                                                           
<a class="button" href="#" onClick="document.location='home.html'">OK</a>
</div> 
</fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>	
</div>
</div>	
</div>
<?php 

mysqli_close($conn1);
?>
</body>
</html>
