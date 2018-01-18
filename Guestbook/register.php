<?php

  include 'db.php';
  
  if(isset($_POST['submit'])){
  if($_POST['first_name']!='' || $_POST['last_name']!='' || $_POST['user_name']!='' ||$_POST['email']!='' || $_POST['password']!='')
  {
  
  mysql_query("insert into users values('','".$_POST['user_name']."','".($_POST['password'])."','".$_POST['email']."','0')"); 
  
  $lastid=mysql_insert_id();
  
  if($lastid)
  {
  	$actual_link = "http://$_SERVER[HTTP_HOST]"."/~stummala/php_new_1/activate.php?id=".$lastid;
	$toEmail = $_POST["email"];
	$subject = "User Registration Activation Email";

	$message = '
 
Please click this link to activate your account:
	<a href='.$actual_link.'>'.$actual_link.'</a>';

	$headers = "From: Admin\r\n";


$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	if(mail($toEmail, $subject, $message, $headers)) 
	{
		$msg = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
	}
  
  }
  }
  else
  {
  $msg='Please enter data in mandatory fields';
  }
  
  
  }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="validation.js"></script>
</head>


 <body>
	<div>
      
		<center><a href="index.php"><em>Log In</em></a></center>
      </p>

                <br><br>
		<center>
		<?php
		if(isset($msg)){
		echo '<span style="color:red;font-weight:bold;">'.$msg.'</span><br/><br/>';
		}
		?>
			<form name='userInfo' method='post'  onsubmit="return checkForm(this);" action='<?php echo $_SERVER["PHP_SELF"];?>'>
                <table border=2  >
					 
                    <tr>
                        <td><p>First Name<sup><font color="red">*</font></sup></p></td>
                        <td><input type="text" id="firstName" name="first_name"placeholder="First Name" "size="20"/></td>

                    </tr>
					
                    <tr>
                        <td><p>Last Name<sup><font color="red">*</font></sup></p></td>
                        <td><input type="text" id="lastName" name="last_name" placeholder="Last Name" "size="20" /></td>
                    </tr>
					
                    <tr>
                        <td><p>E-Mail ID<font color="red">*</font></p></td>
                        <td><input type="text" id='email' name='email' placeholder="Email ID" "size="20" /></td>
                    </tr>
					
					<tr>
                        <td><p>Usernmae<sup><font color="red">*</font></sup></p></td>
                        <td><input type="usernmae" id='sernmae' name='user_name' placeholder="Usernmae" "size="20" /></td>
                    </tr>
					
                    <tr>
                        <td><p>Password<sup><font color="red">*</font></sup></p></td>
                        <td><input type="password" id='password' name='password' placeholder="Password" "size="20" /></td>
                    </tr>
					
                    <tr>
                        <td><p>Confirm Password<sup><font color="red">*</font></sup></p></td>
                        <td><input type="password" id="cPassWord"name="confirm_password"  class="name" placeholder="Retype Password" size="20" /></td>
                    </tr>
					
                </table>
				<p align="center"><input type="submit" value="Submit" name="submit" /></p>
            
				

			</form>

		</center>
	</div>
	<?php
                $ip= $_SERVER['REMOTE_ADDR'];
                print "Ip Address:$ip";
    ?>
</body>
</html>
