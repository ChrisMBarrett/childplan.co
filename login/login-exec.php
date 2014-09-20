<?php

header("location: ../Dashboard/");

/*
    	
	//Start session
	session_start();

// Identify Users IP Address to store later
	    if (getenv(HTTP_X_FORWARDED_FOR)) { 
        $ip_address = getenv(HTTP_X_FORWARDED_FOR); 
    } else { 
        $ip_address = getenv(REMOTE_ADDR);
    }
	
	//Include database connection details
	require_once('../includes/db_connect.inc');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	//$login = clean($_POST['login']);
	//$password = clean($_POST['password']);
	
	//Unsanitized ones
	$login = $_POST['username'];
	$password = $_POST['password'];
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	// Create query
	$login_code=mysql_query("SELECT tbl_users_id,tenant_id, user_fname, user_lname, user_level, user_active,centre_blocked
	FROM tbl_users,tbl_centre_info 
	WHERE user_email='$login' AND user_password='$password' and tbl_users.tenant_id=tbl_centre_info.tbl_centre_info_id");
	
	while ($row = mysql_fetch_array($login_code))
  {
$centre_blocked =	$row['centre_blocked'];
$user_active = 		$row['user_active'];
  }

// Check to see if the centre has been blocked
		if ($centre_blocked == 1){
		header("location: login-denied-centre.php");
		exit();		
		}		

// Check to see if the user has been blocked - direct to the access denied page.
		if ($user_active != 1){
		header("location: login-denied.php");
		exit();
		}		
else
{

// If these are both OK, the set session variables up		
$login_qry="SELECT 
				tbl_users_id,
				tenant_id,
				user_fname,
				user_lname,
				user_level,
				user_active,
				centre_blocked,
				tbl_centre_info_id,
				centre_name,
				target_full
			FROM 
				tblUsers,
				tbl_centre_info 
			WHERE 
				user_email='$login' 
				AND user_password='$password' 
				AND user_active='1' 
				AND tbl_users.tenant_id=tbl_centre_info.tbl_centre_info_id
				AND centre_blocked = 0";
	
$result= mysql_query($login_qry);	
	
//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1 ) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$userid = $member['tbl_users_id'];
			$tenant_id = $member['tenant_id'];
			// Define Session Variables
			$_SESSION['SESS_MEMBER_ID'] 		= $member['tbl_users_id'];
			$_SESSION['SESS_FIRST_NAME'] 		= $member['user_fname'];
			$_SESSION['SESS_LAST_NAME'] 		= $member['user_lname'];
			$_SESSION['SESS_USER_LEVEL'] 		= $member['user_level'];
			$_SESSION['SESS_TENANT_ID'] 		= $member['tenant_id'];
			$_SESSION['SESS_USER_ACTIVE'] 		= $member['user_active'];
			$_SESSION['SESS_CENTRE_NAME'] 		= $member['centre_name'];
			$_SESSION['SESS_TARGET_FULL'] 		= $member['target_full'];
			
			$usertableupdate = mysql_query("Update tbl_users set logins=logins+1 where tbl_users_id = $userid");
			$userloginsert = mysql_query("Insert into tbl_user_log (tenant_id,user_id,ip_address,last_login) 
			values ('$tenant_id','$userid','$ip_address',now())");
	
			session_write_close();
			header("location: ../dashboard/");
			exit();
		}
						
		else {
			//  If the login fails - redirect the user to the Login failed page
			header("location: login-failed.php");
			exit();
		}
	}
	else {
		die("Query failed");
	}
}
/*
?>