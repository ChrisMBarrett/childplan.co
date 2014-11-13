<?php
	
// Update Email Address
	
include('../includes/DBConnect.inc');
include '../includes/auth.php';
	
	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$EmailAddress	= $_POST['value'];
	
	// Update Enquiries Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquiryEmailAddress				= 	'$EmailAddress'
							WHERE  
								EnquiryID						= 	$ID
							AND
								CentreID 						= $CentreID";
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>