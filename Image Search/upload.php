<?php
	// database connection
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
		
	
	//retrieving the image file name from the meta data
	$fileName = $_FILES['userfile']['name'];
	//parsing details, location data from user input
	$name=$_POST['name'];
	$details=$_POST['details'];
	$location=$_POST['location'];
	
	
	
	//upload only if required fields are validated
	//advice - referred to stackoverflow.com for inserting the image to database;
	if($details&&location&&$fileName){
		$name = $_POST['name'];
		//$details = $_POST['details'];
		$image = addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
		//$imagetype = getimagesize($_FILES['upload']['tmp_name']);
		$imgtype = $image['mime'];
		//$location = $_POST['location'];
		$tag = $_POST['tag'];

			
		$query ="INSERT INTO imagesdb VALUES('','$fileName','$details','$image','$imgtype','$location','$tag')";

		$result = mysql_query($query,$conn);
		if($result)
		{
		echo "Upload Successfull\n";

		echo nl2br("\n");
		
		//hyper links for show and search images
		print( '<a href="show.php"><b>View the uploaded images<b></a>' );
		echo "</br>";
		echo "</br>";
		print( '<a href="showsearch.php"><b>Filter images by keyword<b></a>' );
	}
	else
	{
		echo mysql_error();
	}

	}
	else{
		print "Please check all the required fields and image selection";
	}

?>