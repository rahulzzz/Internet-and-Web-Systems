<?php
 include 'db.php';
if(isset($_GET['id'])){
 $id=$_GET['id'];

  mysql_query("UPDATE users set active=1 Where id='".$id."'"); 
  
  echo '<center style="color:red;font-weight:bold;">Your account have been activated successfully</center><br/><br/>';

}
?>