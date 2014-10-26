<!DOCTYPE html>
<html lang="en">

<head>

<?php 
	include('../includes/pagetitle.php');
	include('../includes/DBConnect.inc');
?>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo $PageTitle; ?>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

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

<?php
// Inlcude the top bar
	include('../includes/topbar.php');
?>
<?php
    include('../includes/sidebar.php');
?>


<div id="page-wrapper">
<!-- User Admin Section -->        	
<!-- User Logins Section -->        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin Section</h1>
        </div>
                <!-- /.col-lg-12 -->
         </div> 
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Logins
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sign Up Date</th>
                                            <th>Last Login Date</th>
                                            <th>Login's This Month</th>
                                            <th>Total Login's</th>
                                        </tr>
                                    </thead>
                                <tbody>
<!-- Create table from Query -->
<?php
$UserLoginSQL = "SELECT
					A.USERID
					,	CONCAT(a.UserFName,' ',a.UserLName) 				AS UserName
					,	Date_Format(a.UserAddedDate,'%D %M %Y')				AS SignUpDate
					,	COUNT(*)											AS TotalLoginCount
					,	Date_Format(MAX(B.LoginDate),'%D %M %Y - %l:%i %p')	AS LastLoginDate
				FROM
					tblUser a
				LEFT OUTER JOIN
					tblUserLog b
				ON
					a.UserID = b.UserID
				WHERE 
					a.centreid = 1			
				GROUP BY
					a.UserID
				ORDER BY
					a.UserID ASC";
	 					
$ListOfUsers = mysqli_query($conn, $UserLoginSQL) or die(mysqli_error($conn));

while($row = $ListOfUsers->fetch_assoc()){
    echo '<tr>'.
    		'<td>'.$row['UserName'].'</td>'.
    		'<td class="td-center">'.$row['SignUpDate'].'</td>'.
    		'<td class="td-center">'.$row['LastLoginDate'].'</td>'.
    		'<td class="td-center">'.$row['TotalLoginCount'].'</td>'.
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

<!-- Edit User Section -->
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit User Settings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Last Login Date</th>
                                            <th>Access Setting</th>
                                            <th>User Role</th>
                                            <th>Deactivate User</th>
                                        </tr>
                                    </thead>
                                <tbody>
<!-- Create table from Query -->
<?php
$UserLoginSQL = "SELECT
					A.USERID
					,	CONCAT(a.UserFName,' ',a.UserLName) 				AS UserName
					,	Date_Format(a.UserAddedDate,'%D %M %Y')				AS SignUpDate
					,	COUNT(*)											AS TotalLoginCount
					,	Date_Format(MAX(B.LoginDate),'%D %M %Y - %l:%i %p')	AS LastLoginDate
				FROM
					tblUser a
				LEFT OUTER JOIN
					tblUserLog b
				ON
					a.UserID = b.UserID
				WHERE 
					a.centreid = 1			
				GROUP BY
					a.UserID
				ORDER BY
					a.UserID ASC";
	 					
$ListOfUsers = mysqli_query($conn, $UserLoginSQL) or die(mysqli_error($conn));

while($row = $ListOfUsers->fetch_assoc()){
    echo '<tr>'.
    		'<td>'.$row['UserName'].'</td>'.
    		'<td class="td-center">'.$row['SignUpDate'].'</td>'.
    		'<td class="td-center">'.$row['LastLoginDate'].'</td>'.
    		'<td class="td-center">'.$row['TotalLoginCount'].'</td>'.
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
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Collapsible Group Item #3
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

        </div>
</div>


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
