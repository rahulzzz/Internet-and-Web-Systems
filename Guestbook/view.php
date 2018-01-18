
<html>
<head>
	<title>Comments</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

//include 'db.php';


// Create connection
$conn = new mysqli("localhost", "stummala", "st0533","stummala");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$result = mysqli_query($conn,"SELECT id,name,email,comment FROM comments");
while($row = mysqli_fetch_array($result))
{ ?>
<br>
<?php echo " "; ?><br>
<?php echo "<b>Comments by Guests :</b>"; ?><br>
<?php echo "Name :"; ?>
<?php echo $row['name']; ?><br>
<?php echo "Email :"; ?>
<?php echo $row['email']; ?><br>
<?php echo "<b>Comment :</b>"; ?>
<?php echo $row['comment']; ?>
<?php }
mysqli_close($conn);
?>
</html>