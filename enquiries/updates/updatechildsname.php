<?php
	
// Update Phone Number
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	$FirstChildsName	= $_POST['value'];
	
	// Update Childs Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiryHistory
							SET
								FirstChildsName 				= 	'$FirstChildsName'
							WHERE  
								EnquiryHistoryID				= 	$ID
							AND
								CentreID 						= $CentreID";
								
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>