<!DOCTYPE html>
<html lang="en">	
<head>

<?php 

include('../includes/DBConnect.inc');
include('../includes/pagetitle.php');

// Get the Enquiry ID from the previous page
$EnquiryID = intval($_REQUEST['ID']);

$EnquiryDetailSQL = "
					SELECT
							EnquiryID																				AS EnquiryID
	 					,	EnquirerName																			AS EnquirerName
	 					,	EnquiryPhoneNumber																		AS ContactPhone
	 					,	EnquiryEmailAddress																		AS ContactEmail
	 					,	EnquiryHistoryID																		AS EnquiryHistoryID
	 					,	FirstChildsName																			AS FirstChildsName
	 					,	DATE_FORMAT(FirstChildsDOB,'%W, %D %M \'%y')											AS FirstChildsDOB
	 					,	FirstChildsDOB																			AS FirstChildsDOB
	 					,	CONCAT_WS
            				( ', '
            				, CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END
            				, CASE WHEN months = 0 THEN NULL ELSE CONCAT(months, ' months') END
            				) 																						AS FirstChildsAge
	 					,	FirstChildsGenderID																		AS FirstChildsGenderID
	 					,	GenderDesc																				AS FirstChildsGender
	 					,	concat(FirstChildsDOWRequested,' (',FirstChildsNumberofDaysRequested, ' Days)')			AS FirstChildsDOW
	 					,	DATE_FORMAT(FirstChildsRequestedStartDate,'%W, %D %M \'%y')								AS FirstChildsIdealStartDate
	 					,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')												AS EnquiryDate
	 					,	EnquiryNotes																			AS EnquiryNotes
	 					,	EnquirySourceID																			AS EnquirySourceID
	 					,	EnquirySourceDesc																		AS EnquirySource
	 					,	EnquiryStatusID																			AS EnquiryStatusID
	 					,	EnquiryStatusDesc																		AS EnquiryStatus
	 					,	EnquiryAddedByUserID																	AS EnquiryAddedByUserID
	 					,	EnquiryAddedByUserName																	AS EnquiryAddedByUserName
	 					,	EnquiryAddedDateTime																	AS EnquiryUpdateDateTime
	 				FROM
	 					(SELECT
	 						a.EnquiryID																				AS EnquiryID
	 					,	a.EnquirerName																			AS EnquirerName
	 					,	a.EnquiryPhoneNumber																	AS EnquiryPhoneNumber
	 					,	a.EnquiryEmailAddress																	AS EnquiryEmailAddress
	 					,	b.EnquiryHistoryID																		AS EnquiryHistoryID
	 					,	b.FirstChildsName																		AS FirstChildsName
	 					,	DATE_FORMAT(b.FirstChildsDOB,'%W, %D %M \'%y')											AS FirstChildsDOB
	 					,	b.FirstChildsDOB																		AS FirstChildsAge
	 					,	b.FirstChildsGenderID																	AS FirstChildsGenderID
	 					,	e.GenderDesc																			AS GenderDesc
	 					,	b.FirstChildsDOWRequested																AS FirstChildsDOWRequested
	 					,	b.FirstChildsNumberofDaysRequested														AS FirstChildsNumberofDaysRequested
	 					,	FirstChildsRequestedStartDate															AS FirstChildsRequestedStartDate
	 					,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')												AS EnquiryDate
	 					,	b.EnquiryNotes																			AS EnquiryNotes
	 					,	a.EnquirySourceID																		AS EnquirySourceID
	 					,	c.EnquirySourceDesc																		AS EnquirySourceDesc
	 					,	a.EnquiryStatusID																		AS EnquiryStatusID
	 					,	d.EnquiryStatusDesc																		AS EnquiryStatusDesc
	 					,	b.AddedByUserID																			AS EnquiryAddedByUserID
	 					,	CONCAT(f.UserFName,' ',f.UserLName)														AS EnquiryAddedByUserName
	 					,	b.DateTimeAdded																			AS EnquiryAddedDateTime
	 					,	IF (Curdate() > FirstChildsDOB,
	 							FLOOR(DATEDIFF(CURDATE(),b.FirstChildsDOB)/365) ,	
	 							'') AS Years
	 					,	IF (Curdate() > FirstChildsDOB,
	 							FLOOR((DATEDIFF(CURDATE(),b.FirstChildsDOB)/365 - FLOOR(DATEDIFF(CURDATE(),b.FirstChildsDOB)/365))* 12) ,	
	 							MONTH(CURDATE())-month(b.FirstChildsDOB) ) AS Months				
	 				FROM	
	 					tblEnquiry a
	 				LEFT JOIN
	 					tblEnquiryHistory b
	 				ON
	 					a.EnquiryID = b.EnquiryID
	 				LEFT JOIN
	 					tblEnquirySource c	
	 				ON
	 					a.EnquirySourceID = c.EnquirySourceID
	 				LEFT JOIN
	 					tblEnquiryStatus d
	 				ON
	 					a.EnquiryStatusID = d.EnquiryStatusID
	 				LEFT JOIN
	 					tblGender e
	 				ON
	 					b.FirstChildsGenderID = e.GenderID
	 				LEFT JOIN
	 					tblUser f
	 				ON
	 					b.AddedByUserID = f.UserID	
	 				WHERE
	 					a.CentreID = $CentreID
	 				AND
	 					a.EnquiryID = $EnquiryID) X
	 				";
	 					
$EnquiryDetail = mysqli_query($conn, $EnquiryDetailSQL) or die(mysqli_error($conn));

while($row = $EnquiryDetail->fetch_assoc()){

					$EnquiryID				=	$row['EnquiryID'];
					$EnquiryName			=	$row['EnquirerName'];
					$EnquiryPhone			=	$row['ContactPhone'];
					$EnquiryEmail			=	'<a href="mailto:'.$row['ContactEmail'].'">'.$row['ContactEmail'].'</a>';
					$EnquiryHistoryID		= 	$row['EnquiryHistoryID'];
					$FirstChildsName		= 	$row['FirstChildsName'];
					$FirstChildsDOB			=	$row['FirstChildsDOB'];
					$FirstChildsAge			= 	$row['FirstChildsAge'];
					$FirstChildsGender		= 	$row['FirstChildsGender'];
					$FirstChildsDOW			=	$row['FirstChildsDOW'];
					$FirstChildsStartDate	=	$row['FirstChildsIdealStartDate'];
					
					$EnquiryNotes			=	stripcslashes(ereg_replace("(\r\n|\n|\r)", "<br />", $row['EnquiryNotes']));  
					$EnquiryDate			=	$row['EnquiryDate'];	
					$EnquirySource			=	$row['EnquirySource'];
					$EnquiryStatus			=	$row['EnquiryStatus'];
					$EnquiryUpdatedDateTime	=	$row['EnquiryUpdateDateTime'];
					$EnquiryNotesAddedBy	= 	$row['EnquiryAddedByUserName'];
}

					$EnquiryUpdatedDateTime = new DateTime($EnquiryUpdatedDateTime, new DateTimeZone("UTC"));
					$EnquiryUpdatedDateTime	->setTimezone(new DateTimeZone($CentreTimeZone));
					$EnquiryUpdatedDateTime	 = $EnquiryUpdatedDateTime->format('D, jS F \'y g:i a');


?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo $PageTitle; ?>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// 
    <!--[if lt IE 9]
    <!--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <!--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
       <!-- jQuery Version 1.11.0 -->
    <script src="../javascript/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../javascript/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../javascript/sb-admin-2.js"></script>

 </head>
<body>

<!-- PHP Includes the Top & Side Bar -->
<?php
// Inlcude the top bar
	include('../includes/topbar.php');
    include('../includes/sidebar.php');
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enquiry Detail - <?php echo $EnquiryName; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<!-- Table Holding Enquiry Detail -->                            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
	                    
                        <div class="panel-heading">
                            Details
                            <div style="float: right;">
                            	<button id="enable" class="btn btn-default">Edit Enquiry</button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
	                        
                            <div class="table-responsive">
                                <table id="user" class="table table-striped table-bordered table-hover">                            
                                    <tbody>
 						 				<tr>
	 						 				<td width="30%">Enquirers Name:</td>
	 						 				<td><a href="#" id="enquiryname" data-type="text" data-pk="<?php echo $EnquiryID; ?>" data-name = "EnquirerName" data-url="updatename.php" data-placement="right" data-title="Enter username"><?php echo $EnquiryName; ?></a></td>	
	 						 			<tr>
	 						 				<td>Contact Phone:</td>
	 						 				<td><a href="#" id="enquiryphone" data-type="text" data-pk="<?php echo $EnquiryID; ?>" data-name = "EnquirerPhone" data-url="updatephone.php" data-placement="right" data-title="Enter Contact Phone"><?php echo $EnquiryPhone; ?></a></td>	
 						 				</tr>
 						 				<tr>
	 						 				<td>Contact Email:</td>
	 						 				<td><?php echo $EnquiryEmail; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Child's Name:</td>
	 						 				<td><a href="#" id="childsname" data-type="text" data-pk="<?php echo $EnquiryHistoryID; ?>" data-name = "FirstChildsName" data-url="updatechildsname.php" data-placement="right" data-title="Enter Childs Name"><?php echo $FirstChildsName; ?></a></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Child's Date of Birth:</td>
	 						 				<td><?php echo $FirstChildsDOB; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Child's Age:</td>
	 						 				<td><?php echo $FirstChildsAge; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Child's Gender:</td>
	 						 				<td><?php echo $FirstChildsGender; ?></td>
 						 				</tr>						                                    						                                    						                                    						                        <tr>
	 						 				<td>Day's of Week Requested:</td>
	 						 				<td></td>
 						 				</tr> 
 						 				<tr>
	 						 				<td>Ideal Start Date:</td>
	 						 				<td><?php echo $FirstChildsStartDate; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>How did you hear about us?:</td>
	 						 				<td><?php echo $EnquirySource; ?></td>
 						 				</tr>						                                    						                                               
 						 				<tr>
	 						 				<td>Notes:</td>
	 						 				<td><?php echo '<b>'.'Enquiry Notes Added By: '.'</b><p>'.$EnquiryNotesAddedBy.' - '.$EnquiryUpdatedDateTime.'<br>'.'<hr>'.$EnquiryNotes; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Original Enquiry Date:</td>
	 						 				<td><?php echo $EnquiryDate; ?></td>
 						 				</tr>
 						 				 						 				<tr>
	 						 				<td>Enquiry Status:</td>
	 						 				<td><?php echo $EnquiryStatus; ?></td>
 						 				</tr>						                                                       
                                    </tbody>
                                </table>
                            </div>
        </div>
<!-- Tour Details -->

<?php
$TourDetailSQL = "
	SELECT
		a.TourID												AS TourID
	,	a.EnquiryID												AS EnquiryID
	,	a.TourWithUserID										AS TourWithUserID
	,	b.UserName												AS TourWithUserName
	,	CONCAT(b.UserFName,' ',b.UserLName)						AS TourWithName
	,	DATE_FORMAT(a.TourDateTime,'%W, %D %M \'%y - %l:%i %p')	AS TourDateTime
	,	a.DateTimeAdded											AS TourAddedDateTime
	,	a.AddedByUserID											AS TourAddedByUserID
	,	CONCAT(c.UserFName,' ',c.UserLName)						AS TourAddedByName
	,	a.TourNotes												AS TourNotes
FROM
	tblTours a
LEFT JOIN
	tblUser b
ON
	a.`TourWithUserID`= b.`UserID`
LEFT JOIN
	tblUser c
ON
	a.`AddedByUserID` = c.`UserID`		
WHERE
	EnquiryID = $EnquiryID
AND
	a.CentreID = $CentreID
	";

$TourDetail = mysqli_query($conn, $TourDetailSQL) or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) != 1)
{
	
	echo "<div class=\"col-lg-12\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            Tour Details - None Booked Yet
                        </div>
                        <!-- /.panel-heading -->
                        <div class=\"panel-body\">
        </div>        
     </div>
 </div>";

}
else
{
while($row = $TourDetail->fetch_assoc()){


					$TourID					= 	$row['TourID'];
					$TourWithname			=	$row['TourWithName'];
					$TourDateTime			= 	$row['TourDateTime'];
					$TourAddedByName		= 	$row['TourAddedByName'];
					$FirstChildsDOW			=	$row['FirstChildsDOW'];
					$TourAddedDateTime2		=	$row['TourAddedDateTime'];					
					$TourNotes				=	stripcslashes(ereg_replace("(\r\n|\n|\r)", "<br />", $row['TourNotes']));  
}

					$TourAddedDateTime = new DateTime($TourAddedDateTime2, new DateTimeZone("UTC"));
					$TourAddedDateTime ->setTimezone(new DateTimeZone($CentreTimeZone));
					$TourAddedDateTime = $TourAddedDateTime->format('D, jS F \'y g:i a');
	
echo "<div class=\"col-lg-12\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            Tour Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table table-striped table-bordered table-hover\">                            
                                    <tbody>
 						 				<tr>
	 						 				<td width=\"29%\">Tour Date & Time:</td>
	 						 				<td>$TourDateTime</td>
	 						 			<tr>
	 						 				<td>Tour Guide:</td>
	 						 				<td>$TourWithname</td>
 						 				</tr>
 						 				<tr>
	 						 				<td><b>Tour Added By: </b>$TourAddedByName</td>						                                    
	 						 				<td><b>Date Added: </b>$TourAddedDateTime </td>						                                    
 						 				</tr>
                                    </tbody>
                                </table>
                            </div>
        </div> ";
        } 
        ?>       
     </div>
</div>
<!-- /#wrapper -->
<!-- x-editable (bootstrap version) -->
<script  src="../javascript/bootstrap-editable.js"></script>
<link href="../css/bootstrap-editable.css" rel="stylesheet">   
    
<!-- main.js -->
<script src="../javascript/updateenquiry.js"></script> 
 
</body>
</html>
