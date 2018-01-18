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
	<title>Show images</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	</head>
	
	<body>
		
		<!-- search field -->
		<form method="post" action="search.php">
		<center><input type="text" name="search" placeholder="enter keyword to filter images"><center>	
		<center><input type="submit" name="submit" value="Filter" ></center>
		</form>
		
		<div>
		<a href="index.php" id="view"><b> Upload pictures</b></a>
		</div>
</br>

		<div>
		<?php

		//$search = $_POST[search];
		
		//query for searching the database
		$sql = "SELECT * from imagesdb
		 ";

		 $result=mysql_query($sql, $conn) or die(mysql_error());
		 //$number=mysql_num_rows($result);

		while($row=mysql_fetch_array($result)){
		
		$id=$row["id"];
		$name=$row["name"];
		$details=$row["details"];
		$image=$row["image"];
		$location=$row["location"];
		$tag=$row["tag"];

		 //code for showing the images
		echo "</br>";
		echo "<strong>Name:</strong>";
		echo $name;
		echo "<strong>, Details:</strong>";
		echo $details;
		echo "<strong>, Location:</strong>";
		echo $location;
		echo "</br>";
		echo "<img src=image.php?id=".$row['id']." width=600 height=600/>";
		echo "</br>";
	} 
		?>

		</div>
	
	</body>
</html>
