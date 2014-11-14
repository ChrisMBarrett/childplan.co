<?php
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';

	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$EnquiryStatus	= $_POST['value'];
	
	// Update Enquiry Status
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquiryStatusID	 				= 	'$EnquiryStatus'
							WHERE  
								EnquiryID						= 	$ID
							AND
								CentreID 						= 	$CentreID";
								
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>