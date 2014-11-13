<?php
	
include('../includes/DBConnect.inc');
include '../includes/auth.php';

	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$EnquiryDate	= date('Y-m-d',strtotime($_POST['value']));
	
	// Update Enquiry Date
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquiryDate		 				= 	'$EnquiryDate'
							WHERE  
								EnquiryID						= 	$ID
							AND
								CentreID 						= $CentreID";
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>