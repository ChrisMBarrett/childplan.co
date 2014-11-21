<?php
	
// Update Phone Number
	
include('../../includes/DBConnect.inc');
include '../../includes/auth.php';
	
	$ID					= $_POST['pk'];
	$FieldName			= $_POST['name'];
	$DaysTillOverDue	= $_POST['value'];
	
	// Update How many days an enquiry is considered overdue
	
	$UpdateDaysTillOverdueSQL 	= " 
							UPDATE
								tblCentre							
							SET
								prefDaysTillOverdue			= 	'$DaysTillOverDue'
							WHERE  
								CentreID 					= 	$CentreID
							";
								
	mysqli_query($conn, $UpdateDaysTillOverdueSQL) or die(mysqli_error($conn));
		
?>