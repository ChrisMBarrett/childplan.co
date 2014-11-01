<?php 
//Start session
session_start();	

$UserName 			= $_SESSION['UserName'];
$UserRole 			= $_SESSION['UserRoleID'];

// Centre ID & Name	
$CentreID			= $_SESSION['CentreID'];
$CentreName 		= $_SESSION['CentreName'];
$CentreTimeZone		= $_SESSION['CentreTimeZone'];

/*
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../login/index.php?message=4");
		exit();
	}
*/
?>