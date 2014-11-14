<?php
	
// Update Enquiry Source
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID				= $_POST['pk'];
	$FieldName		= $_POST['name'];
	$EnquirySource	= $_POST['value'];
	
	// Update Enquiries Name
	
	$UpdateEnquirySQL 	= " 
							UPDATE
								tblEnquiry
							SET
								EnquirySourceID 				= 	'$EnquirySource'
							WHERE  
								EnquiryID						= 	$ID
							AND
								CentreID 						= $CentreID";
								
	$UpdateEnquiry = mysqli_query($conn, $UpdateEnquirySQL) or die(mysqli_error($conn));
		
?>