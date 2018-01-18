<?php
/*
$connection=mysql_connect("localhost","stummala","st0533");
mysql_select_db("stummala",$connection);
*/

// Create connection
$connection = mysql_connect("localhost", "stummala", "st0533");
mysql_select_db("stummala",$connection);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

?>