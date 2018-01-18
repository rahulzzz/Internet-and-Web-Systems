<html>
	<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	
	<form method="post" action="search.php">
	<input type="text" name="search" placeholder="enter keyword to filter images">
	<input type="submit" name="submit" value="Filter">
	</form>
	<center>
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

	$search = $_POST[search];
	

	$sql = "SELECT * from imagesdb
	WHERE name like '%$search%' OR
	details like '%$search%' OR
	location like '%$search%' OR
	tag like '%$search%'
	 ";
	 
	 $result=mysql_query($sql, $conn) or die(mysql_error());
	
	 $number=mysql_num_rows($result);
	  
	print "<center><strong>$number result(s) found for $search</strong></center>";
	
	while($row=mysql_fetch_array($result)){
	$id=$row["id"];
	$name=$row["name"];
	$details=$row["details"];
	$image=$row["image"];
	$location=$row["location"];
	$tag=$row["tag"];

	echo "</br>";
	echo "<strong>Name:</strong>";
	echo $name;
	echo "</br>";
	echo "<strong> Details:</strong>";
	echo $details;
	echo "</br>";
	echo "<strong> Location:</strong>";
	echo $location;
	echo "</br>";
	echo "<img src=image.php?id=".$row['id']." width=600 height=600/>";


	} 
	?>
	 </center>

	</body>
</html>

