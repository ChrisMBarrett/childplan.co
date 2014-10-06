<!DOCTYPE html>
<html lang="en">
<head>
 
<?php 
// Include the Page title file
	include_once('../includes/pagetitle.php');


			
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

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- DatePicker -->
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
// Inlcude the top bar
	include_once('../includes/topbar.php');
    include_once('../includes/sidebar.php');
   
// Link to the DB file
   include('../includes/dbconnect.inc'); 
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Enquiry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <form action="addenquiryprocess.php" method="post">
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
            Enter Enquiry Details
            </div>       
            	<div class="panel-body">
                	<div class="row">
                    	<div class="col-lg-6">
                        <form role="form">
                        	<div class="form-group">
                            <label>Enquirer's Name:</label>
                            <input class="form-control" placeholder="Enter name" name="enquirername">
                            </div>
                            	<div class="form-group">
                                <label>Contact Phone:</label>
                                <input class="form-control" placeholder="Phone Number" name="contactphone">
                                <p class="help-block">Best contact phone number.</p>
                                </div>
                                	<div class="form-group">
                                    <label>Contact Email Address:</label>
                                    <input class="form-control" placeholder="Email Address" name="contactemail">
                                    <p class="help-block">Best contact email address.</p>
                                    </div>
                                    
<!-- Enquiry Date -->	
<label>Date of Enquiry</label>
	<div class='input-group date' id='enquirydate'>
		<input type='text' class="form-control" name="enquirydate" data-date-format="DD-MM-YYYY" />
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
	</div>
	<script type="text/javascript">
		$(function () {
		$('#enquirydate').datetimepicker({pickTime: false});          
		});
		</script>

<!-- Children's Details -->                                      
<!-- Number of Children -->
<div class="form-group">
	<label>How Many Children?</label>
    	<select class="form-control" name="numberofchildren">
        	<option>Please select ...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5+</option>
         </select>
</div>

			</form>
		</div>
	</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->                 
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="../javascript/jquery-1.11.0.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../javascript/plugins/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../javascript/sb-admin-2.js"></script>
<!-- Moment JavaScript -->
<script type="text/javascript" src="../javascript/moment.js"></script>
<!-- Bootstrap DatePicker -->
<script type="text/javascript" src="../javascript/bootstrap-datetimepicker.min.js"></script>
       
</body>
</html>
