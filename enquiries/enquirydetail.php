<!DOCTYPE html>
<html lang="en">	
<head>

<?php 

include('../includes/dbconnect.inc');
include('../includes/pagetitle.php');

// Get the Enquiry ID from the previous page
$EnquiryID = intval($_REQUEST['ID']);

$EnquiryDetailSQL = "SELECT
						a.EnquiryID																				AS EnquiryID
	 					,a.EnquirerName																			AS EnquirerName
	 					,a.EnquiryPhoneNumber																	AS ContactPhone
	 					,a.EnquiryEmailAddress																	AS ContactEmail
	 					,b.FirstChildsName																		AS FirstChildsName
	 					,DATE_FORMAT(b.FirstChildsDOB,'%W, %D %M \'%y')											AS FirstChildsDOB
	 					,b.FirstChildsDOB																		AS FirstChildsAge
	 					,b.FirstChildsGenderID																	AS FirstChildsGender
	 					,concat(b.FirstChildsDOWRequested,' (',FirstChildsNumberofDaysRequested, ' Days)')		AS FirstChildsDOW
	 					,'Soon (in X months time)'																AS FirstChildsIdealStartDate
	 					,DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')												AS EnquiryDate
	 					,b.EnquiryNotes																			AS EnquiryNotes
	 					,a.EnquirySourceID																		AS EnquirySourceID
	 					,c.EnquirySourceDesc																	AS EnquirySource
	 					,a.EnquiryStatusID																		AS EnquiryStatusID
	 					,d.EnquiryStatusDesc																	AS EnquiryStatus
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
	 				WHERE
	 					a.CentreID = $CentreID
	 				AND
	 					a.EnquiryID = $EnquiryID";
	 					
$EnquiryDetail = mysqli_query($conn, $EnquiryDetailSQL) or die(mysqli_error($conn));

while($row = $EnquiryDetail->fetch_assoc()){

					$EnquiryName			=	$row['EnquirerName'];
					$EnquiryPhone			=	$row['ContactPhone'];
					$EnquiryEmail			=	'<a href="mailto:'.$row['ContactEmail'].'">'.$row['ContactEmail'].'</a>';
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
}


?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo $PageTitle; ?>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Data Tables -->    
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">                            
                                    <tbody>
 						 				<tr>
	 						 				<td>Enquirers Name:</td>
	 						 				<td><?php echo $EnquiryName; ?></td>
	 						 			<tr>
	 						 				<td>Contact Phone:</td>
	 						 				<td><?php echo $EnquiryPhone; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Contact Email:</td>
	 						 				<td><?php echo $EnquiryEmail; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Child's Name:</td>
	 						 				<td><?php echo $FirstChildsName; ?></td>
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
	 						 				<td><?php echo $FirstChildsDOW; ?></td>
 						 				</tr> 
 						 				<tr>
	 						 				<td>Ideal Start Date</td>
	 						 				<td><?php echo $FirstChildsStartDate; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>How did you hear about us?:</td>
	 						 				<td><?php echo $EnquirySource; ?></td>
 						 				</tr>						                                    						                                               
 						 				<tr>
	 						 				<td>Notes:</td>
	 						 				<td><?php echo $EnquiryNotes; ?></td>
 						 				</tr>
 						 				<tr>
	 						 				<td>Enquiry Date:</td>
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
<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tour Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">                            
                                    <tbody>
 						 				<tr>
	 						 				<td>Tour Date & Time:</td>
	 						 				<td><?php echo $EnquiryName; ?></td>
	 						 			<tr>
	 						 				<td>Tour Guide:</td>
	 						 				<td><?php echo $EnquiryPhone; ?></td>
 						 				</tr>						                                    
                                    </tbody>
                                </table>
                            </div>
        </div>        
     </div>
 </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../javascript/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../javascript/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../javascript/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../javascript/sb-admin-2.js"></script>
    
</body>
</html>
