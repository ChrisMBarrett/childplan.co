<?php
	
// Update Phone Number
	
include('../includes/DBConnect.inc');
include '../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	$FirstChildsGender	= $_POST['value'];
	
	// Update Childs Gender
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiryHistory
							SET
								FirstChildsGenderID				= 	'$FirstChildsGender'
							WHERE  
								EnquiryHistoryID				= 	$ID
							AND
								CentreID 						= 	$CentreID";
								
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>