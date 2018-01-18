<?php

$session_username = $_SESSION['username'];
if($_POST['login'])
{
	$username = (strip_tags($_POST['username']));
	$password = (strip_tags($_POST['password']));
	
	if(!$username||!$password)
		echo "enter username and password";
	else
	{
		$login = mysql("SELECT * FROM users WHERE username='$username'");
		if(mysql_num_rows($login)==0)
			echo "no registered user";
		else
		{
			while($login_row = mysql_fetch_assoc($login))
			{
				$password_db = $login_row['password'];
				
				if($password!=$password_db)
					echo "incorrect password";
				else
				{
					$active = $login_row['active'];
					$email = $login_row['email'];
					
					if(active==0)
						echo "account has not been activated, check ur email";
					else
					{
						$_SESSION[$username]=$username;
						header("Location: index.php");
					}
				}
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>


 <body>
	<div>
	<center>
		<!--Login form-->
		<form action='login.php' method='POST'>
			<table border=2>
					<tr>
					<td><p>User Name</p></td>
					<td><input type='text' name='username' placeholder="User Name"/></td>
					</tr>
					
					<tr>
					<td><p>Password</p></td>
					<td><input type='password' name='password' placeholder="Password"/></td>
					</tr>
						
			</table>
					<br>
					<input type='submit' value='Log in'><br>
		</form> 
	</center>
	
	
	
			<center><p>Don't have an account <a href='register.php'>Register</a> here</p></center>
	
	</div>
	
	
	<!-- Geo Location-->
	<!-- Used a part of the code from w3 schools-->
	
		<p id="location"><em>Click the button to get your Location.<em></p>
		
		<ul style="display: inline-block;" >
		<button onclick="getLocation()">Your location</button>
		</ul>
		
		<div id="mapholder"></div>
		<center>
		<script>
		var x = document.getElementById("location");

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			} else {
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}

		function showPosition(position) {
			var latlon = position.coords.latitude + "," + position.coords.longitude;

			var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
			+latlon+"&zoom=14&size=400x300&sensor=false";
			document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
			 
			// x.innerHTML = "Latitude: " + position.coords.latitude + 
			//"<br>Longitude: " + position.coords.longitude;
		}

		function showError(error) {
			switch(error.code) {
				case error.PERMISSION_DENIED:
					x.innerHTML = "User denied the request for Geolocation."
					break;
				case error.POSITION_UNAVAILABLE:
					x.innerHTML = "Location information is unavailable."
					break;
				case error.TIMEOUT:
					x.innerHTML = "The request to get user location timed out."
					break;
				case error.UNKNOWN_ERROR:
					x.innerHTML = "An unknown error occurred."
					break;
			}
		}
		
			//Detecting users browser and OS
			// I have used the code snippet from stackoverflow
			var nVer = navigator.appVersion;
			var nAgt = navigator.userAgent;
			var browserName  = navigator.appName;
			var fullVersion  = ''+parseFloat(navigator.appVersion); 
			var majorVersion = parseInt(navigator.appVersion,10);
			var nameOffset,verOffset,ix;

			//Opera
			if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
			 browserName = "Opera";
			 fullVersion = nAgt.substring(verOffset+6);
			 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
			   fullVersion = nAgt.substring(verOffset+8);
			}
			//MSIE
			else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
			 browserName = "Microsoft Internet Explorer";
			 fullVersion = nAgt.substring(verOffset+5);
			}
			//Chrome
			else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
			 browserName = "Chrome";
			 fullVersion = nAgt.substring(verOffset+7);
			}
			//Safari
			else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
			 browserName = "Safari";
			 fullVersion = nAgt.substring(verOffset+7);
			 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
			   fullVersion = nAgt.substring(verOffset+8);
			}
			//Firefox
			else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
			 browserName = "Firefox";
			 fullVersion = nAgt.substring(verOffset+8);
			}
			// In most other browsers, "name/version" is at the end of userAgent 
			else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
					  (verOffset=nAgt.lastIndexOf('/')) ) 
			{
			 browserName = nAgt.substring(nameOffset,verOffset);
			 fullVersion = nAgt.substring(verOffset+1);
			 if (browserName.toLowerCase()==browserName.toUpperCase()) {
			  browserName = navigator.appName;
			 }
			}
			// trim the fullVersion string at semicolon/space if present
			if ((ix=fullVersion.indexOf(";"))!=-1)
			   fullVersion=fullVersion.substring(0,ix);
			if ((ix=fullVersion.indexOf(" "))!=-1)
			   fullVersion=fullVersion.substring(0,ix);

			majorVersion = parseInt(''+fullVersion,10);
			if (isNaN(majorVersion)) {
			 fullVersion  = ''+parseFloat(navigator.appVersion); 
			 majorVersion = parseInt(navigator.appVersion,10);
			}

			document.write(''
			 +'Browser name  = '+browserName+'<br>'
			 +'Version  = '+fullVersion+'<br>'
			)
			
			var OSName="Unknown OS";
			if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
			if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
			if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
			if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
			if (navigator.appVersion.indexOf("Android")!=-1) OSName="Android";

			document.write('Your OS: '+OSName);
		</script>
		</center>
	<center>
	
	<!-- IP address -->
	<div style="position: relative">
            <p style="position: fixed; bottom: 0; width:100%; text-align: center">
	<?php
        $ip= $_SERVER['REMOTE_ADDR'];
        print "Ip Address:$ip";
    ?>
	<br>
	<!-- the below code can be used for detecting browser and OS -->
	<!--<?php echo "Browser Information:"; ?>-->
	<!--<?php echo $_SERVER['HTTP_USER_AGENT'];?>-->
	
</body>
</html>			