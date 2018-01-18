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


$id = $_GET['id']; 
$query = "SELECT image,imagetype FROM imagesdb where id='$id'"; //query for retrieving the image
$result = mysql_query("$query",$conn);

if($result)
{
	$row = mysql_fetch_array($result);
	$type = "Content-type: ".$row['imagetype'];
	header($type);
	echo $row['image'];
}
else
{
	echo mysql_error();
}

?>