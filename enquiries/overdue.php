<!DOCTYPE html>
<html lang="en">	
<head>

<!-- Queries that build the number of enquries etc. -->
<?php 

include('../includes/DBConnect.inc');
include('../includes/pagetitle.php');

$OverDueValue					= 2;

// Create Number of Enquiries
$NumberOfEnquiriesSQL 			= "
	SELECT
		*
	FROM
		tblenquiry
	WHERE
		CentreID 				= $CentreID
	AND
		EnquiryStatusID 		= 1";
	
$NumberofEnquiries 				= mysqli_query($conn, $NumberOfEnquiriesSQL) or die(mysqli_error($conn));
$OpenEnquiriesCount 			= mysqli_num_rows($NumberofEnquiries);

// Enquiries from Entered Directly on the Website
$NumberOfEnquiriesWebsiteSQL 	= "
	SELECT
		*
	FROM
		tblenquiry
	WHERE
		CentreID 				= $CentreID
	AND
		EnquiryStatusID 		= 1
	AND
		EnquiryType 			= 0	";
	
$NumberofEnquiriesWebsite 		= mysqli_query($conn, $NumberOfEnquiriesWebsiteSQL) or die(mysqli_error($conn));
$EnquiriesWebsiteCount 			= mysqli_num_rows($NumberofEnquiriesWebsite);

// Number of Tours
$NumberOfToursSQL 	= "
	SELECT
		*
	FROM
		tblTours
	WHERE
		CentreID 				= $CentreID
	AND
		TourDateTime >= curdate()
		";
	
$NumberofTours 					= mysqli_query($conn, $NumberOfToursSQL) or die(mysqli_error($conn));
$NumberOfToursCount 			= mysqli_num_rows($NumberofTours);


// Get Overdue Enquiries
$NumberOfOverdueEnquiriesSQL 	= "
	SELECT
		*
	FROM
		tblenquiry
	WHERE
		CentreID 				= 1
	AND
		DATEDIFF(curdate(),EnquiryLatestUpdateDateTime) >= $OverDueValue 
		";
	
$NumberofOverDueEnquiries 	= mysqli_query($conn, $NumberOfOverdueEnquiriesSQL) or die(mysqli_error($conn));
$NumberofOverDueEnquiries 	= mysqli_num_rows($NumberofOverDueEnquiries);

?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo $PageTitle; ?>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

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
                    <h1 class="page-header">Overdue Enquiries</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
	            
<!-- Open Enquiries Box -->	            
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $OpenEnquiriesCount; ?></div>
                                    <div>Open Enquiries</div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="addenquiry.php">
                            <div class="panel-footer">
                                <span class="pull-left">Add New Enquiry</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
	</div>
</div>
                
<!-- Direct Enquiries Box -->                
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $EnquiriesWebsiteCount; ?></div>
                                    <div>From Website</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

<!-- Upcoming Tours Box-->                
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-heart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $NumberOfToursCount; ?></div>
                                    <div>Upcoming Tours</div>
                                </div>
                            </div>
                        </div>
                        <a href="../tours/">
                            <div class="panel-footer">
                                <span class="pull-left">View Tours</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
<!-- Overdue Enquries Box -->                                
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-warning fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $NumberofOverDueEnquiries; ?></div>
                                    <div>Follow Up</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
</div>	                                         

<!-- Table of Open Enquiries -->                            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Open Centre Enquiries
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Enquirer's Name</th>
                                            <th>Contact Phone</th>
                                            <th>Child's Name</th>
                                            <th>Child's Age</th>
                                            <th>Tour Booked</th>
                                            <th>Last Update</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
<!-- Build Table from Query Results -->
<?php
$OpenEnquiriesSQL = "
	SELECT	
		EnquiryID												AS EnquiryID
	,	EnquirerName											AS ContactName
	,	EnquiryPhoneNumber										AS ContactPhone
	,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y') 				AS EnquiryDate
	,	IF (FirstChildsName ='', '-',FirstChildsName)			AS FirstChildsName
    ,	FirstChildsDOB											AS FirstChildsDOB
    ,	IF (FirstChildsDOB IS NULL,'-', CONCAT_WS
            ( ', '
            , CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END
            ,  CONCAT(months, ' months')
            )) AS ChildsAge
    ,	EnquiryUpdateDateTime									AS EnquiryUpdateDateTime
    ,	IF (TourDateTime IS NULL, 'No', DATE_FORMAT(TourDateTime,'%a, %D %b \'%y  - %l:%i %p')) AS TourBooked 
  FROM
     ( SELECT 
            	a.EnquiryID
            ,	b.EnquirerName
            ,	b.EnquiryPhoneNumber
            ,	b.EnquiryDate
            ,	b.EnquiryLatestUpdateDateTime					AS EnquiryUpdateDateTime
            ,	a.FirstChildsName
            , 	a.FirstChildsDOB
            ,	a.DateTimeAdded
            , 	IF (Curdate() > FirstChildsDOB,
            		FLOOR(DATEDIFF(CURDATE(),a.FirstChildsDOB)/365) ,	
            		'') AS Years
            ,	IF (Curdate() > FirstChildsDOB,
            		FLOOR((DATEDIFF(CURDATE(),a.FirstChildsDOB)/365 - FLOOR(DATEDIFF(CURDATE(),a.FirstChildsDOB)/365))* 12) ,	
            		MONTH(CURDATE())-month(a.FirstChildsDOB) ) 	AS Months
            , 	c.`TourDateTime`								AS TourDateTime
         FROM 
         	tblenquiryhistory a
         LEFT JOIN
         	tblEnquiry b
         ON
         	a.EnquiryID = b.EnquiryID
         LEFT JOIN
         	tblTours c
         ON
         	b.`EnquiryID` = c.`EnquiryID`
         WHERE
         	a.CentreID = $CentreID
         AND
         	b.EnquiryStatusID = 1     	
         ORDER BY
		 	EnquiryUpdateDateTime DESC			
     ) x
     ;";


	 					
$ListOfEnquiries 		= mysqli_query($conn, $OpenEnquiriesSQL) or die(mysqli_error($conn));

while($row = $ListOfEnquiries->fetch_assoc()){
	
	$EnquiryUpdatedDateTime = new DateTime($row['EnquiryUpdateDateTime'], new DateTimeZone("UTC"));
	$EnquiryUpdatedDateTime	->setTimezone(new DateTimeZone($CentreTimeZone));
	$EnquiryUpdatedDateTime	 = $EnquiryUpdatedDateTime->format('D, jS M \'y');	
	
    echo '<tr>'.
    		'<td>'.'<a href="enquirydetail.php?ID='.$row['EnquiryID'].'">'.$row['ContactName'].'</a>'.'</td>'.
    		'<td class="td-center">'.$row['ContactPhone'].'</td>'.
    		'<td class="td-center">'.$row['FirstChildsName'].'</td>'.
    		'<td class="td-center">'.$row['ChildsAge'].'</td>'.
    		'<td class="td-center">'.$row['TourBooked'].'</td>'.
    		'<td class="td-center">'.$EnquiryUpdatedDateTime.'</td>'.
          '</tr>';
}

?>	 						 										                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- /.row -->

<!-- Chart Example -->            


<!-- Donut Chart - Enquiry Outcome -->

                        <!-- /.panel-body -->
                                </span>
                            </div>

                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../javascript/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../javascript/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../javascript/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../javascript/plugins/morris/raphael.min.js"></script>
    <script src="../javascript/plugins/morris/morris.min.js"></script>
    <script src="../javascript/plugins/morris/morris-data.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="../javascript/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../javascript/plugins/dataTables/dataTables.bootstrap.js"></script> 

    <!-- Custom Theme JavaScript -->
    <script src="../javascript/sb-admin-2.js"></script>
    
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    
</body>
</html>
