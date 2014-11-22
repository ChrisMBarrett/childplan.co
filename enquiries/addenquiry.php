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
    
    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>

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

<!--  php include files -->
<?php

// Link to the DB file
   include('../includes/DBConnect.inc'); 

// Inlcude the top bar
	include_once('../includes/topbar.php');
    include_once('../includes/sidebar.php');
?>

<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        <h1 class="page-header">Add New Enquiry</h1>
        </div>
        <!-- /.col-lg-12 -->
            </div>
<!-- Set Up Form -->                
<form id="AddEnquiryForm" action="addenquiryprocess.php" method="post">
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
        	<div class="panel-heading">
            Enter Enquiry Details
            </div>       
            <div class="panel-body">
                <div class="row">
                	<div class="col-lg-6">
	                        
<!-- Enquirier's Name -->
<div class="form-group">

                            <label>Enquirer's Name(s):</label>
                            <input class="form-control" placeholder="Enter name" name="enquirername">
                            </div>

<!-- Contact Phone Number -->	
<div class="form-group">
                                <label>Contact Phone:</label>
                                <input class="form-control" placeholder="Phone Number" name="contactphone">
                                <p class="help-block">Best contact phone number.</p>
                                </div>

<!-- Contact Email Address -->   	
<div class="form-group">
                                    <label>Contact Email Address:</label>
                                    <input class="form-control" placeholder="Email Address" name="contactemail">
                                    <!-- <p class="help-block">Best contact email address.</p> -->
                                    </div>
                                    
<!-- Enquiry Date -->
<div class="form-group">	
<label>Date of Enquiry</label>
	<div class='input-group date' id='enquirydate'>
		<input type='text' class="form-control" name="enquirydate" data-date-format="DD-MM-YYYY" />
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
		<script type="text/javascript">
		$(function () {
		$('#enquirydate').datetimepicker({pickTime: false});          
		});
		</script>
	</div>
</div>	

<!-- Children's Details -->                                      
<!-- Number of Children -->
<div class="form-group">
	<label>How Many Children?</label>
    	<select class="form-control" name="numberofchildren">
        	<option value="">Please Select ...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5+</option>
         </select>
</div>

<!-- Child 1's Details --> 
<!-- Child 1's Name -->                                      
<div class="form-group">
	<label>Child's Name:</label>
    	<input class="form-control" placeholder="Child's Name" name="child1sname">
        <p class="help-block">If known.</p>
</div>
                                        
<!-- Child 1's DOB -->
<div class="form-group"> 
	<label>Child's DOB (actual or expected):</label>
		<div class='input-group date' id='child1sdob'>
			<input type='text' class="form-control" name="child1sdob" data-date-format="DD-MM-YYYY"/>
			<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
			</span>
				<script type="text/javascript">
				$(function () {
				$('#child1sdob').datetimepicker({pickTime: false});          
				});
	</script>
		</div>
</div>		

<!-- Child 1's Gender -->										 
<div class="form-group">
	<label>Child's Gender</label>
    	<select class="form-control" name="child1sgender" id="child1sgender">
    		<option value="">Please Select ...</option>
        	<option value="1">Boy</option>
			<option value="2">Girl</option>
			<option value="3">Not Known</option>
		</select>
</div>

<!-- Days Requested in the week -->										 
<div class="form-group">
	<label>Days Requested</label>
    	<select multiple class="form-control" name="daysofweek[]" size="5">
        	<option value='M'>Monday</option>
			<option value='T'>Tuesday</option>
			<option value='W'>Wednesday</option>
			<option value='H'>Thursday</option>
			<option value='F'>Friday</option>
		</select>
</div>

<!-- Number of Days Requested -->										 
<div class="form-group">
	<label>Number of Days Requested</label>
    	<select class="form-control" name="numberofdays">
        	<option value="">Please Select ...</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
         </select>
</div>

<!-- Child 1's Ideal Start Date -->
<div class="form-group">
	<label>Ideal Start Date:</label>
		<div class='input-group date' id='child1startdate'>
		<input type='text' class="form-control" name="child1startdate" data-date-format="DD-MM-YYYY"/>
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
		<script type="text/javascript">
		$(function () {
		$('#child1startdate').datetimepicker({pickTime: false});          
		});
	</script>
		</div>
</div>		
							
<!-- Enquiry Notes -->	
<div class="form-group">
	<label>Notes</label>
    	<textarea class="form-control" rows="3" name="enquirynotes"></textarea>
</div>
                                     
<!-- How did they hear about us? -->
<!-- This list is drawn from tblEnquirySource    -->
<div class="form-group">
	<label>How did you hear about us?</label>
    	<select class="form-control" name="enquirysource">
        	<option value="">Please Select ...</option>
			<?php
				// Get the list of staff who can conduct tours
				$EnquirySourceSQL = 	"SELECT
						EnquirySourceID,
						EnquirySourceDesc
					FROM
						tblenquirysource
					WHERE
						CentreID in (0, 1)
					ORDER BY
						SortOrder ASC";
					
				$EnquirySource = mysqli_query($conn, $EnquirySourceSQL) or die(mysqli_error($conn));
					
				$EnquirySource->data_seek(0);
				while($row = $EnquirySource->fetch_assoc())
					{
					echo '<option value ='.$row['EnquirySourceID'].'>'.$row['EnquirySourceDesc'].'</option>';
					}		
?>						
        </select>
</div>
 									
<!-- Tour Information & Details -->
<!-- Date & Time for the tour -->
<div class="form-group">
<label>Tour Date & Time</label> 
	<div class='input-group date' id='tourtime'>
		<input type='text' class="form-control" name="tourdatetime" />
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
		<script type="text/javascript">
		$(function () {
		$('#tourtime').datetimepicker();          
		});
		</script>
	</div>
</div>		
										
<!-- Who is the tour being conducted by -->
<label>Which Staff Member is Conducting the Tour?</label>
<div class="form-group">
    	<select class="form-control" name="tourguide">
        	<option value="">Please Select ...</option>
			<?php
				// Get the list of staff who can conduct tours

				$StaffToursSQL = 	"SELECT
						UserID,
						UserFName,
						CONCAT(UserFName, ' ',UserLName) AS TourGuide
					FROM
						tblUser
					WHERE
						UserConductsToursFlag = 1
					AND
						UserActiveFlag = 1	
					AND
						CentreID = '$CentreID'";
					
				$TourGuides = mysqli_query($conn, $StaffToursSQL) or die(mysqli_error($conn));
					
				$TourGuides->data_seek(0);
				while($row = $TourGuides->fetch_assoc())
					{
					echo '<option value ='.$row['UserID'].'>'.$row['TourGuide'].'</option>';
					}		
?>						
        </select>
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

<!-- Form Validation Script -->
<script>
$(document).ready(function() {
    $('#AddEnquiryForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            enquirername: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enquirer\'s Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                }
            },
            contactemail: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            enquirydate: {
                validators: {
                    notEmpty: {
                        message: 'The date of enquiry is required'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'The enquiry date is not valid'
                    }
                }
            },
            numberofchildren: {
                validators: {
                    notEmpty: {
                        message: 'Please select a number of children'
                    },
                }
            },          
            enquirysource: {
                validators: {
                    notEmpty: {
                        message: 'The Enquiry Source is required'
                    }
                }
            },
            child1sgender: {
                validators: {
                    notEmpty: {
                        message: 'The childs gender is required, select \'Not known\' if required.'
                    }
                }
            }
        }
    });
});
</script>

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
<!-- BootstrapValidator JS -->
<script type="text/javascript" src="../javascript/bootstrapValidator.min.js"></script>
       
</body>
</html>
