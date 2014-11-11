<?php
	
include('../includes/DBConnect.inc');
	
	$CentreID 		= 1;
	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$EnquirerName	= $_POST['value'];
	
	// Update Enquiries Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquirerName	 				= 	'$EnquirerName'
							,	EnquiryLatestUpdateDateTime		= 	UTC_TIMESTAMP()
							WHERE  EnquiryID					= 	$ID
							AND
								CentreID = $CentreID";
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>