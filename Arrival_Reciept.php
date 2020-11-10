<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arrival Reciept</title>
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
                                <li><a class="active" href="Arrival.html">Arrival</a></li>
                                <li><a href="Departure.html">Departure</a></li>
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
<h3 class="p2">Arrival Reciept</h3>


<?php
$code=rand(pow(10, 4-1), pow(10, 4)-1);
$numplate = $_GET["numberplate"];
$color = $_GET["color"];
$arrival = $_GET["arrivaltime"];
$selectedtype= $_GET["VehicleType"];
$vahicletype;
$RikshawCharges=25;
$CarCharges=50;
$BusCharges=100;
$SuzukiCharges=75;
$ScooterCharges=20;
$Charges = 0;

if($selectedtype == 'rikshaw'){
	$vehicletype="Rikshaw";
 $Charges=$RikshawCharges;
}
else if($selectedtype == 'car'){
	$vehicletype="Car";
 $Charges=$CarCharges;
}
else if($selectedtype == 'bus'){
 $vehicletype="Bus";
 $Charges=$BusCharges;
}
else if($selectedtype == 'suzuki'){
	$vehicletype="Suzuki";
 $Charges=$SuzukiCharges;
}
else if($selectedtype == 'scooter'){
	$vehicletype="Scooter";
 $Charges=$ScooterCharges;
}


$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "weproject";
$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
 
$sql="INSERT IGNORE INTO arrive_reciept (code,numberplate,color,arrivaltime,vehicletype,charges)

VALUES

('$code','$numplate','$color','$arrival','$vehicletype','$Charges')";

if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
?>


<form id="contact-form">
<fieldset>

<label><span class="text-form">Code Assign:</span><span class="text-form2"><?php echo $code; ?></span></label>
<label><span class="text-form">Arrival Time:</span><span class="text-form2"><?php echo $arrival; ?></span></label>
<label><span class="text-form">Number Plate</span><span class="text-form2"><?php echo $numplate; ?></span></label>
<label><span class="text-form">Vehicle Type:</span><span class="text-form2"><?php echo $vehicletype; ?></span></label>
<label><span class="text-form">Color:</span><span class="text-form2"><button type="button" disabled style="background-color:<?php echo $color;?>; width:120px; height:30px"></button></span></label>
<label><span class="text-form">Charges:</span><span class="text-form2"><?php echo $Charges; ?></span></label>
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
mysqli_close($conn);
?>

</body>
</html>