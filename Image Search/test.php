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


$name = $_POST['name'];
$details = $_POST['details'];
$image = addslashes (file_get_contents($_FILES['photo']['tmp_name']));
$imagetype = getimagesize($_FILES['photo']['tmp_name']);//to know about image type etc
$imgtype = $image['mime'];
$location = $_POST['location'];
$tag = $_POST['tag'];




$query ="INSERT INTO imagesdb VALUES('','$name','$details','$image','$imgtype','$location','$tag')";

$result = mysql_query($query,$conn);
if($result)
{
echo "Upload Successfull\n";

echo nl2br("\n");

print( '<a href="show.php"><b>View the uploaded images<b></a>' );
print( '<a href="showsearch.php"><b>Filter images by keyword<b></a>' );
}
else
{
echo mysql_error();
}


?>