<?php

$conn = mysql_connect("localhost","stummala","st0533");
if(!$conn)
{
echo mysql_error();
}
$db = mysql_select_db("stummala",$conn);
if(!$db)
{
echo mysql_error();
}

?>


<html>
	<head>
	<title>Current City Images</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	</head>
	
	<body>
	<script>
	/*
		function next(){
			document.write("in next");


		}
		function previous(){
			document.write("in previous");
		}
	*/
	</script>
		<form method="post" action="search.php">
		<input type="text" name="search" placeholder="enter keyword to filter images">
		<input type="submit" name="submit" value="Filter" >
		</form>
		<!--
		<table border='1' align="center">
		
		<td><input type='button' value='Previous' name='previousbutton' onclick="previous()"></td>
		<td><input type='button' value='Next' name='nextbutton' onclick="next()"></td>
		
		</table>
		-->
		<div>
		<a href="index.php" id="view"><b> Upload pictures</b></a>
		</div>
<center>
<div>

<!-- basic idea for displaying city has been taken from http://www.91weblessons.com/get-city-country-by-ip-address-in-php/ -->
<?php
//style="float: left;"
	/*Get user ip address*/
	$ip_address=$_SERVER['REMOTE_ADDR'];

	/*Get user ip address details with geoplugin.net*/
	$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
	$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

	/*Get City name by return array*/
	$city = $addrDetailsArr['geoplugin_city']; 

	/*Get Country name by return array*/
	$country = $addrDetailsArr['geoplugin_countryName'];
	echo "Current Location: ";
	echo $city;


	$search = $_POST[search];
	//echo $search;


	$sql = "SELECT * from imagesdb
	WHERE location like '$city'
	";
	 
	 $sqlcity = "SELECT location from imagesdb
	WHERE location like'$city'
	";
	
	//echo $sqlcity;
	 $result=mysql_query($sql, $conn) or die(mysql_error());
	 $resultcity=mysql_query($sqlcity, $conn) or die(mysql_error());
	//echo $resultcity;
	
	 $number=mysql_num_rows($result);
	 
	 $number1=mysql_num_rows($resultcity);
	 //echo "number ";
	 //echo $number1;
	 echo "</br>";
	 if($number1==0){
		 print "no images at current location";
	 }
	 
	
	echo "</br>";
	
	while($row=mysql_fetch_array($result)){
	//$row=mysql_fetch_array($result);
	$id=$row["id"];
	$name=$row["name"];
	$details=$row["details"];
	$image=$row["image"];
	$location=$row["location"];
	$tag=$row["tag"];


	//echo "</br>";
	echo "<strong>Name:</strong>";
	echo $name;
	//echo "</br>";
	echo "<strong> Details:</strong>";
	echo $details;
	//echo "</br>";
	echo "<strong> Location:</strong>";
	echo $location;
	//echo "</br>";
	echo "</br>";
	echo "</br>";

	echo "<img src=image.php?id=".$row['id']." width=600 height=600/>";
	echo "</br>";

	}	
?>

</div>
</center>

<!-- Used as it is from w3 schools -->
<script>
var x = document.getElementById("demo");


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }


function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}
</script>
	</body>
</html>
