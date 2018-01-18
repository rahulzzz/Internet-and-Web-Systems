<?php

include 'db.php';
session_start();

	
	
if(isset($_POST['submit']))
{
	if($_POST['name']!='' || $_POST['email']!='' || $_POST['comments']!='')
	{
		mysql_query("insert into comments values('','".$_POST['name']."','".($_POST['email'])."','".$_POST['comments']."')");
		echo "<em><b>We have received your comments, Thank You </b></em>";
	}

	else
	{
	  $msg="enter all the fields";
	}
}
?>


<html>
<head>
	<title>Guest Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<head/>


<body>

	<p align="center"><a href="logout.php"><em>Logout</em></a>
	<h2> Guestbook</h2>
	
	<?php
		if(isset($msg)){
		echo '<span style="color:red;font-weight:bold;">'.$msg.'</span><br/><br/>';
		}
	?>
		
	<form action='guestbook.php' method='POST'>
	<p>Name: <input type=text name=name placeholder="Your name"><br></p>
	<p>Email ID: <input type=text name=email placeholder="id@mail.com"><br></p>
	<p>Your Comments:</p>
	
	<textarea name=comments rows=10 cols=80 placeholder="Type your comments over here">
	</textarea>
	<br>
	
	<input type="submit" value="Submit" name="submit" />
	</form>
	<br>
	
	
</body>
</html>

<?php
 include("view.php"); 
 ?>
 

