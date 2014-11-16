<!DOCTYPE html>
<html lang="en">
<head>

<?php 
	include('../includes/DBConnect.inc');
	include('../includes/pagetitle.php');
	
//	$centre_tz = "Pacific/Auckland";
?>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo $PageTitle; ?>
    
    
    <!-- jQuery Version 1.11.0 -->
    <script src="../javascript/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../javascript/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../javascript/sb-admin-2.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

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

<?php
// Inlcude the top bar
	include('../includes/topbar.php');
    include('../includes/sidebar.php');
?>

<div id="page-wrapper">
<!-- User Admin Section -->        	
<!-- User Logins Section -->        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Admin Section</h1>
        </div>
                <!-- /.col-lg-12 -->
         </div> 
    <div class="row">
                <div class="col-lg-12">
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          User Login Details
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Sign Up Date</th>
                                            <th>Last Login Date</th>
                                            <th>Password</th>
                                            <th>Total Login's</th>
                                        </tr>
                                    </thead>
                                <tbody>
<!-- Create table from Query -->
<?php
$UserLoginSQL = "SELECT
					A.USERID
					,	CONCAT(a.UserFName,' ',a.UserLName) 				AS UserName
					,	UserPassword										AS UserPassword
					,	a.UserAddedDate										AS UserSignUpDate
					,	COUNT(*)											AS TotalLoginCount
					,	MAX(b.LoginDate)									AS LastLoginDate
				FROM
					tblUser a
				LEFT OUTER JOIN
					tblUserLog b
				ON
					a.UserID = b.UserID
				WHERE 
					a.centreid = $CentreID			
				GROUP BY
					a.UserID
				ORDER BY
					a.UserID ASC";
	 					
$ListOfUsers = mysqli_query($conn, $UserLoginSQL) or die(mysqli_error($conn));

while($row = $ListOfUsers->fetch_assoc()){

					$LastLoginDate = new DateTime($row['LastLoginDate'], new DateTimeZone('UTC'));
					$LastLoginDate	->setTimezone(new DateTimeZone('Pacific/Auckland'));
					$LastLoginDate	 = $LastLoginDate->format('D, jS F \'y g:i a');
					
					$UserSignUpDate = new DateTime($row['UserSignUpDate'], new DateTimeZone('UTC'));
					$UserSignUpDate	->setTimezone(new DateTimeZone($CentreTimeZone));
					$UserSignUpDate	 = $UserSignUpDate->format('D, jS F \'y');
					 					
    echo '<tr>'.
    		'<td>'.$row['UserName'].'</td>'.
    		'<td class="td-center">'.$UserSignUpDate.'</td>'.
    		'<td class="td-center">'.$LastLoginDate.'</td>'.
    		'<td class="td-center">'.$row['UserPassword'].'</td>'.
    		'<td class="td-center">'.$row['TotalLoginCount'].'</td>'.
          '</tr>';                  
          
}

?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- /.row -->
            
            </div>
            <!-- /.row -->
        </div>

<!-- Update Existing User Section -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Update Existing User
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
                            <div class="table-responsive">
                                <table id="user" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Role</th>
                                            <th>System User Group</th>
                                            <th>Tour Guide?</th>
                                            <th>User Activate ?</th>
                                        </tr>
                                    </thead>
                                <tbody>
<!-- Create table from Query -->
<?php
$UserLoginSQL = "SELECT
						A.USERID											AS StaffID
					,	CONCAT(a.UserFName,' ',a.UserLName) 				AS UserName
					,	a.UserGroupID										AS UserGroupID
					,	b.UserGroupDesc										AS UserGroup
					,	a.UserRoleID										AS UserRoleID
					,	c.UserRoleDesc										AS UserRole
					,	UserConductsToursFlag								AS TourGuideFlag
					,	UserActiveFlag										AS UserActiveFlag
				FROM
					tblUser a
				LEFT OUTER JOIN
					tblUserGroups b
				ON
					a.UserGroupID = b.UserGroupID
				Left JOIN
					tblUserRole c
				ON
					a.UserRoleID = c.UserRoleID		
				WHERE 
					a.centreid = $CentreID			
				GROUP BY
					a.UserID
				ORDER BY
					a.UserID ASC";
	 					
$ListOfUsers = mysqli_query($conn, $UserLoginSQL) or die(mysqli_error($conn));

while($row = $ListOfUsers->fetch_assoc()) : ?>

<tr>
	<td class="td-center"><?php echo $row['UserName']; ?></td>	
	<td class="td-center"><?php echo $row['UserRole']; ?></td>	
	<td class="td-center"><?php echo $row['UserGroup']; ?></td>	
	<td class="td-center"><a href="#" class="tourguide" data-type="select" data-source="[{value: 0, text: 'No'},{value: 1, text: 'Yes'}]" data-url="updates/updatetourguide.php" data-value="<?php echo $row['TourGuideFlag']; ?>" data-pk="<?php echo $row['StaffID']; ?>" data-name="UserConductsToursFlag"</a></td>
	<td class="td-center"><? $row['UserName']; ?></td>			
</tr>
<?php endwhile; ?>	
<!--
{
    echo '<tr>'.
    		'<td>'.$row['UserName'].'</td>'.
    		'<td class="td-center">'.$row['UserRole'].'</td>'.
    		'<td class="td-center">'.$row['UserGroup'].'</td>'.
//    		'<td class="td-center">'.$row['TourGuide'].'</td>'.
    		'<td class="td-center">'.'<a href="#" id="tourguide" data-type="select" data-url="updates/updatetourguide.php" data-source="[{value: 0, text: \'No\'},{value: 1, text: \'Yes\'}]"   
    		 data-value="'.$row['TourGuideFlag'].'" data-pk="'.$row['StaffID'].'"></a></td>'.
    		'<td class="td-center">'.$row['UserActiveFlag'].'</td>'.
          '</tr>';
}

-->



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- /.row -->          
            </div>
<!-- /.row -->


<!-- Add New User Section -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Add New User
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>


<?php
	if ($UserGroupID == 1)
	{
	include ('../includes/centreadmin.php');
	}
	else
	{
	echo "";
	}
?>	          
        </div>
</div>


<script  src="../javascript/bootstrap-editable.js"></script>
<link href="../css/bootstrap-editable.css" rel="stylesheet">   
    
<!-- Update.js -->
<script src="../javascript/updateadmindetails.js"></script> 
    
</body>

</html>
