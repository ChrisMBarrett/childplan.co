<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Centre Admin Section</h1>
    </div>
</div>
<!-- Centre Admin Section -->
<?php
// Get the number of days till a enquiry is considered overdue
$EnquiryOverDueSQL = 
	"
	SELECT
		CentreID
	,	prefDaysTillOverdue
	FROM
		tblCentre
	WHERE
		CentreId = 1		
	";

$EnquiryOverDue = mysqli_query($conn, $EnquiryOverDueSQL) or die(mysqli_error($conn));

while($row = $EnquiryOverDue->fetch_assoc()){
	$EnquiryOverDueDays = $row['prefDaysTillOverdue'];
	$CentreID 			= $row['CentreID'];
}
	
?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Manage Centre Settings
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <table width="90%">
	      <tr>
		      <td>How Many days till an enquiry is considered over due?</td><td><a href="#" class="daystilloverdue"  data-url="updates/updatedaystilloverdue.php" data-value="<?php echo $EnquiryOverDueDays; ?>" data-pk="<?php echo $CentreID; ?>" data-name="prefDaysTillOverdue"</a></td>
	      </tr>  
	        
        </table>
      </div>
    </div>
  </div>
</div>
