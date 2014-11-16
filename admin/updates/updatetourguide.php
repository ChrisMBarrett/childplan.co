<?php
	
// Update Phone Number
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	$ConductTour		= $_POST['value'];
	
	// Update Whether Staff Conducts Tour
	
	$UpdateConductTourSQL 	= " 
							UPDATE
								tblUser							
							SET
								UserConductsToursFlag			= 	'$ConductTour'
							WHERE  
								UserID							= 	$ID
							AND
								CentreID 						= 	$CentreID
							";
								
	$UpdateConductTour = mysqli_query($conn, $UpdateConductTourSQL) or die(mysqli_error($conn));
		
?>