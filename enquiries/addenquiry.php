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

<!-- Child 1's Details --> 
<!-- Child 1's Name -->                                      
<div class="form-group">
	<label>Child's Name:</label>
    	<input class="form-control" placeholder="Child's Name" name="child1sname">
        <p class="help-block">If known.</p>
</div>
                                        
<!-- Child 1's DOB -->
<div class="form-group"> 
	<label>Child's DOB (know or expected):</label>
		<div class='input-group date' id='childdob'>
			<input type='text' class="form-control" name="childsdob" data-date-format="DD-MM-YYYY"/>
			<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
			</span>
		</div>
</div>		
	<script type="text/javascript">
		$(function () {
		$('#childdob').datetimepicker({pickTime: false});          
		});
	</script>

<!-- Child's Gender -->										 
<div class="form-group">
	<label>Child's Gender</label>
    	<select class="form-control" name="gender">
    		<option value='0'>Please Select ...</option>
        	<option value='1'>Boy</option>
			<option value='2'>Girl</option>
			<option value='3'>Not Known</option>
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
        	<option>Please select ...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
         </select>
</div>

<!-- Child 1's Ideal Start Date -->
<div class="form-group">
	<label>Ideal Start Date:</label>
		<div class='input-group date' id='startdate'>
		<input type='text' class="form-control" name="startdate" data-date-format="DD-MM-YYYY"/>
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
		</div>
</div>		
	<script type="text/javascript">
		$(function () {
		$('#startdate').datetimepicker({pickTime: false});          
		});
	</script>							

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
        	<option value="0">Please Select ...</option>
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

	 									
<!-- Tour Details -->
<!-- Date & Time for the tour	
<label>Tour Date & Time</label>
	<div class='input-group date' id='tourtime'>
		<input type='text' class="form-control" name="tourdatetime" />
		<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
		</span>
	</div>
	<script type="text/javascript">
		$(function () {
		$('#tourtime').datetimepicker();          
		});
		</script>
-->									
<!-- Who is the tour being conducted by 
<label>Who is conducting the tour?</label>
<div class="form-group">
    	<select class="form-control" name="tourguide">
        	<option value="0">Please Select ...</option>
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
	-->
											                     
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
