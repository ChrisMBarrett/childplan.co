<?php 
// Check to see if the user is on an iPhone
/*if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== FALSE)  
{ header('Location: http://m.childplan.co.nz'); }
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
		<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1"><title>Childplan | Login</title>
<link rel="stylesheet" href="../css/login_styles.css" type="text/css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jQuery.dPassword.js"></script>
<script type="text/javascript">
	$(document).ready( function() {
		$('input:password').dPassword();
	});
</script>	
</head>
<body style="background-image:url('../images/background.jpg');">
    <div id="wrapper">
        <div id="container">
            <img src="../images/login_image3.jpg">
			<div id="login_box">
			<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
		<label>Username:</label>
			<input type="text" name="username" />
		<label>Password:</label>
			<input type="password" name="password" id="password" />
			<input type="submit" value="Submit" name="submit" class="submit" />
</form>
			</div>
        </div>
</body>
</html>
