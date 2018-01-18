<html>
<head>

	<title>Uploading the pictures</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	</head>
	<body>
	<form enctype="multipart/form-data" action="upload.php" method="POST">


	<h2 align=center >Welcome!!!</h2>


	<!-- used sample CSS templates from different websites-->
	<table border=10   bgcolor=blue class="hovertable">
		<tr><td colspan=2><h2>Upload Your Photos</h2></td></tr>
		
		<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
		<td><b>Description<font color="red">*</font><b></td><td><input type=text name="details" placeholder="About the Image"></td>
		</tr>
		
		<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
		<td><b>Location<font color="red">*</font><b></td><td><input type=text name="location" placeholder="Where was this taken"></td>
		</tr>
		
		<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
		<td><b>Tag<b></td><td><input type=text name="tag" placeholder="Related tags"></td>
		</tr>
		
		
	</table>
		
	</br>
		
		
		<td><input name=userfile id="userfile" type="file"  ></td>
		<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
		
	</form>
		
		
	<a href="show.php" id="view"><b> Click here to view the uploaded images</b></a>
	</br>
	</br>
	<a href="showsearch.php" id="view"><b> Search images based on key word</b></a>
	</br>
	</br>
	<a href="location.php" id="view"><b> Search images that were taken at the current city</b></a>



	<!-- basic idea for displaying city has been taken from http://www.91weblessons.com/get-city-country-by-ip-address-in-php/ and I had made my changes-->
	<div style="position: relative">
				<p style="position: fixed; bottom: 0; width:100%; text-align: center">
		<?php
		/*Get user ip address*/
		$ip_address=$_SERVER['REMOTE_ADDR'];

		/*Get user ip address details with geoplugin.net*/
		$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
		$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

		/*Get City name by return array*/
		$city = $addrDetailsArr['geoplugin_city']; 

		/*Get Country name by return array*/
		$country = $addrDetailsArr['geoplugin_countryName'];

	
		if(!$city){
		   $city='Not Define';
		}if(!$country){
		   $country='Not Define';
		}
		echo '<strong>IP Address</strong>:- '.$ip_address.'<br/>';
		echo '<strong>City</strong>:- '.$city.'<br/>';
		?>
		</div>
	
	<!-- Used as it is from w3 schools-->
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

