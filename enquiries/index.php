<!DOCTYPE html>
<html lang="en">	
<head>

<?php 

include('../includes/DBConnect.inc');
include('../includes/pagetitle.php');

// Create Number of Enquiries
$NumberOfEnquiriesSQL 			= "
	SELECT
		*
	FROM
		tblenquiry
	WHERE
		CentreID 				= $CentreID
	AND
		EnquiryStatusID 		= 1 ";
	
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

// Get Overdue Enquiries
$NumberOfOverdueEnquiriesSQL 	= "
	SELECT
		*
	FROM
		tblenquiry
	WHERE
		CentreID 					= $CentreID
	AND
		EnquiryStatusID 			= 1
	AND
		DATEDIFF(EnquiryDate,now()) >=5 ";
	
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
                    <h1 class="page-header">Centre Enquiries Overview</h1>
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
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">?</div>
                                    <div>Upcoming Tours</div>
                                </div>
                            </div>
                        </div>
                        <a href="calendar.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Tour Details</span>
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
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $NumberofOverDueEnquiries; ?></div>
                                    <div>Overdue Follow Ups!</div>
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
                                            <th>Child's Age</th>
                                            <th>Tour Booked</th>
                                            <th>Enquiry Date</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
<!-- Build Table from Query Results -->
<?php
$OpenEnquiriesSQL = "SELECT
	 					EnquirerName											AS EnquirerName
	 					,EnquiryPhoneNumber										AS ContactPhone
	 					,''														AS ChildsName
	 					,''														AS ChildsAge
	 					,DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')				AS EnquiryDate
	 				FROM
	 					tblEnquiry
	 				WHERE
	 					CentreID = '$CentreID'
	 				AND
	 					EnquiryStatusID = 1";
	 					
$ListOfEnquiries = mysqli_query($conn, $OpenEnquiriesSQL) or die(mysqli_error($conn));

while($row = $ListOfEnquiries->fetch_assoc()){
    echo '<tr>'.
    		'<td>'.$row['EnquirerName'].'</td>'.
    		'<td>'.$row['ContactPhone'].'</td>'.
    		'<td>'.$row['ChildsName'].'</td>'.
    		'<td>'.$row['ChildsAge'].'</td>'.
    		'<td>'.$row['EnquiryDate'].'</td>'.
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
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Enquiries By Week
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-12">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                       
                        </div>
                        <!-- /.panel-body -->
                    </div>


<!-- Donut Chart - Enquiry Outcome -->
<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Enquiry Outcome - Last 12 Months
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                         <!-- Link to Results Details   
	                         <a href="#" class="btn btn-default btn-block">View Details</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                        </div>
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
