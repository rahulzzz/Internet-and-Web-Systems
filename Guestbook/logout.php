<?php
session_start();

session_destroy();

echo "successfully logged out. <a href='index.php' >click </a> here to log in";


?>