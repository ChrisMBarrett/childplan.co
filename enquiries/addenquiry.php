<!DOCTYPE html>
<html lang="en">

<head>

<?php include('../includes/pagetitle.php');?>
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
	include('../includes/topbar.php');
?>
<?php
    include('../includes/sidebar.php');
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
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Phone:</label>
                                            <input class="form-control" placeholder="Phone Number" name="contactphone">
                                        </div>
                                         <div class="form-group">
                                            <label>Contact Email Address:</label>
                                            <input class="form-control" placeholder="Email Address" name="contactemail">
                                        </div>
                                         <div class="form-group">
                                            <label>Child's Name:</label>
                                            <input class="form-control" placeholder="Child's Name" name="childsname">
                                        </div>
                <label>Child's DOB (know or expected):</label>
                <div class='input-group date' id='childdob'>
                    <input type='text' class="form-control" name="childsdob" data-date-format="DD-MM-YYYY"/>
                    <span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
                    </span>
                </div>
					<script type="text/javascript">
						$(function () {
							$('#childdob').datetimepicker({pickTime: false});          
							});
							</script>
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <textarea class="form-control" rows="3" name="enquirynotes"></textarea>
                                        </div>
                                          <div class="form-group">
                                            <label>How did you hear about us?</label>
                                            <select class="form-control" name="enquirysource">
                                                <option>Please select ...</option>
                                                <option>Referral</option>
                                                <option>Word of Mouth</option>
                                                <option>Web Search</option>
                                                <option>Website</option>
                                                <option>Walked Past</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                       </div>
                                       </div> 
                  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="col-lg-6">
                            Tour Details
                        </div>
                                              
                        <label>Tour Date & Time</label>
						<div class='input-group date' id='tourtime'>
                    <input type='text' class="form-control" name="tourdatetime"/>
                    <span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
                    </span>
                </div>
            </div>
        </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#tourtime').datetimepicker();          
            });
        </script>

                   </div>                     
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
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
