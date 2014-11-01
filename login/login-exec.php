<?php
session_start();	

// Connect to Database
include '../includes/DBConnect.inc';

// Login form values
	$UserName = $_POST["username"];
	$Password = $_POST["password"];

// Identify Users IP Address to store later
    if (getenv(HTTP_X_FORWARDED_FOR)) { 
       $ip_address = getenv(HTTP_X_FORWARDED_FOR); 
    } else { 
        $ip_address = getenv(REMOTE_ADDR);
    }

// Create Login Query
$LoginSQLCode =  "
	SELECT
		a.UserID,
		a.CentreID,
		b.CentreName,
		b.CentreTimeZone,
		a.UserName,
		a.UserFName,
		a.UserLName,
		a.UserRoleID,
		a.UserActiveFlag,
		a.UserGroupID
	FROM 
		tblUser a
	LEFT JOIN
		 tblCentre	b
	ON
		a.`CentreID` = b.`CentreID`
	WHERE
	 	UserEmailAddress = '$UserName'
	AND
	 	UserPassword = '$Password'";				 	
	
if(!$result = $conn->query($LoginSQLCode)){
    die('There was an error running the query [' . $db->error . ']');
}

if($result->num_rows != 1)
{
header("location: login-denied.php");
}
else
{
while($row = $result->fetch_assoc())
{
	$UserID 						= $row['UserID'];
	$UserFName						= $row['UserFName'];
	$UserLName						= $row['UserLName'];
	$UserActiveFlag 				= $row['UserActiveFlag'];
	$UserRoleID						= $row['UserRoleID'];
	$UserGroupID					= $row['UserGroupID'];
	$CentreID						= $row['CentreID'];
	$CentreName						= $row['CentreName'];
	$CentreTimeZone					= $row['CentreTimeZone'];
}
}
/*
// Check to see if the centre has been blocked
		if ($centre_blocked == 1){
		header("location: login-denied-centre.php");
		exit();		
		}		
*/

// Check to see if the user has been blocked - direct to the access denied page.
		if ($UserActiveFlag != 1){
		echo - 'Sorry - Your account is currently blocked!';
		//header("location: login-denied.php");
		exit();
		}		
else
{
// If these are both OK, the set session variables up		
session_regenerate_id();
// Define Session Variables
	$_SESSION['UserID']			 	= $UserID;
	$_SESSION['UserFName']		 	= $UserFName;
	$_SESSION['UserLName']		 	= $UserLName;
	$_SESSION['UserName']		 	= $UserFName.' '.$UserLName;
	$_SESSION['UserRoleID']		 	= $UserRoleID;
	$_SESSION['UserGroupID']		= $UserGroupID;
	$_SESSION['CentreID']		 	= $CentreID;
	$_SESSION['CentreName']		 	= $CentreName;
	$_SESSION['CentreTimeZone']	 	= $CentreTimeZone;			
			
session_write_close();

// Update the UserLog Table			
$UserLogUpdateSQL = "INSERT INTO tblUserLog 
			(UserId, CentreID, IPAddress, LoginDate)
	VALUES
			($UserID,$CentreID,'$ip_address',UTC_TIMESTAMP())";

mysqli_query($conn,$UserLogUpdateSQL);

// Direct the User to the main site page
header("location: ../enquiries/");
exit();
}			
?>