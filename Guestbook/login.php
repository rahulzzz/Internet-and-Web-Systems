<?php
include 'db.php';
//user session
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

	if($username&&password)
	{
		
		$query= mysql_query("SELECT * FROM users WHERE username='$username'");
		
		//check if the user exit or not
		$numrows= mysql_num_rows($query);
		
		if($numrows!=0)
		{
			//for log in_array - mysql fetches row as array
			while($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
			}
			
			//check username and password
			if($username==$dbusername && $password==$dbpassword)
			{
				echo "<b>Welcome!!!</b> \n\n <a href='guestbook.php'> <em><b>Click</b><em> </a> here to access guestbook";
				//echo "inside sign in page";
				$_SESSION['username']=$username; //setting a session
			}
			else
				echo "Wrong password, Please check the password,  click here to <a href='index.php'><b>Log in</b></a>";
		}
		else
			die("User does not exist, Please check the username, click here to <a href='index.php'><b>Log in</b></a>");
		
	}
	else
		die("Please enter a user name and password correctly, click here to <a href='index.php'><b>Log in</b></a>");
?>

<html>
<div bottom=0>
<?php
                $ip= $_SERVER['REMOTE_ADDR'];
                print "Ip Address:$ip";
?>
</div>
</html>