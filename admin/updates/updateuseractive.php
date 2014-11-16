<?php
	
// Update User Active Status
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	$UserActive			= $_POST['value'];
	
	// Update Whether Staff Conducts Tour
	
	$UserActiveSQL 	= " 
							UPDATE
								tblUser							
							SET
								UserActiveFlag					= 	'$UserActive'
							WHERE  
								UserID							= 	$ID
							AND
								CentreID 						= 	$CentreID
							";
								
	 mysqli_query($conn, $UserActiveSQL) or die(mysqli_error($conn));
		
?>