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
								EnquirerName	 	= 	'$EnquirerName'
							WHERE  EnquiryID		= 	$ID";
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>