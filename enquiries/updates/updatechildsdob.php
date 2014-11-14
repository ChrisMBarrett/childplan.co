<?php
	
// Update Childs DOB
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	
	
	$FirstChildsDOB		= date('Y-m-d',strtotime($_POST['value']));
	
	//$_POST['value'];
	
	// Update Childs Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiryHistory
							SET
								FirstChildsDOB 					= 	'$FirstChildsDOB'
							WHERE  
								EnquiryHistoryID				= 	$ID
							AND
								CentreID 						= 	$CentreID";
								
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>