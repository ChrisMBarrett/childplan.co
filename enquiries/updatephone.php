<?php
	
// Update Phone Number
	
include('../includes/DBConnect.inc');
include '../includes/auth.php';
	
	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$PhoneNumber	= $_POST['value'];
	
	// Update Enquiries Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquiryPhoneNumber 				= 	'$PhoneNumber'
							WHERE  EnquiryID					= 	$ID
							AND
								CentreID 						= $CentreID";
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>