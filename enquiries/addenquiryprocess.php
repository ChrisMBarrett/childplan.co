<?php

include('../includes/pagetitle.php');
include('../includes/DBConnect.inc');

// Collect All the Variables
$UserID				= $_SESSION['UserID'];
$CentreID			= $_SESSION['CentreID'];

$EnquirerName 		= $_POST["enquirername"];
$EnquirerPhone		= $_POST["contactphone"];
$EnquirerEmail		= $_POST["contactemail"];
$EnquiryDate		= date('Y-m-d',strtotime($_POST["enquirydate"]));

$NumberOfChildren	= $_POST["numberofchildren"];

$EnquirySource		= $_POST["enquirysource"];

$Child1sName		= $_POST["child1sname"];
$Child1DOB			= date('Y-m-d',strtotime($_POST["childsdob"]));

$Child1DOW			= $_POST["daysofweek"];
$Child1DOWInsert	= implode($Child1DOW);

$Child1NumberDOW	= count($_POST["daysofweek"]);


// Process the records to the database

//echo 'Hello'."<br>".'You Have added some records to the database';
//exit;


//$conn->autocommit(FALSE);

// Add Values to the Enquiry Table
/*
$EnquiryAddSQL = "
INSERT INTO
	tblEnquiry
	(CentreID, EnquirerName, EnquiryPhoneNumber, EnquiryEmailAddress, NumberOfChildren, EnquirySourceID, EnquiryStatusID, EnquiryDate, AddedByUserID, EnquiryAddedDateTime)
VALUES
	($CentreID, '$EnquirerName', '$EnquirerPhone', '$EnquirerEmail', $NumberOfChildren, $EnquirySource, 1, '$EnquiryDate', $UserID, NOW())
";
					
mysqli_query($conn, $EnquiryAddSQL ) or die(mysqli_error($conn));
//$conn->commit();
// Get the Insert ID of the Enquiry
$EnquiryID = $conn->insert_id;
Echo 'Success? - '.$EnquiryID;
/*
// Add Values to the Enquiry History Table
$EnquiryHistoryAddSQL = "
INSERT INTO
	tblEnquiryHistory
	(EnquiryID,CentreID,FirstChildsName,FirstChildsDoWRequested,FirstChildsNumberOfDaysRequested,AddedByUserID,DateTimeAdded)
VALUES
	($EnquiryID,$CentreID,'$Child1sName','$Child1DOWInsert',$Child1NumberDOW,$UserID,Now())
";
					
mysqli_query($conn, $EnquiryHistoryAddSQL ) or die(mysqli_error($conn));

*/


echo "<b>"."Enquirer Details"."</b>"."<br>";
echo "Enquirer's Name is: ".$_POST["enquirername"]."<br>";
echo "Enquirer's Contact Number: ".$_POST["contactphone"]."<br>";
echo "Enquirer's Contact Email: ".$_POST["contactemail"]."<p>";
echo "<b>"."Children's Details"."</b>"."<br>";
echo "Number of Children: ".$_POST["numberofchildren"]."<br>";
echo "Child's Name: ".$_POST["childsname"]."<p>";
echo "Child's Gender: ".$_POST["gender"]."<p>";


echo "Child's DOB: ".$_POST["childsdob"]."<br>";
echo "Child's DOB - MySQL Format: "; 

if ($_POST["childsdob"] == "") {echo ""."<br>";} else {echo date("Y-m-d",strtotime($_POST["childsdob"]))."<p>";}

//else {echo date("Y-m-d",strtotime($_POST["childsdob"]))}; echo "<p>";


echo "Days of Week Requested: "; 
$test = $_POST["daysofweek"];

echo implode($test);

echo "<br>";

echo 'Number of Days per week: '.count($_POST["daysofweek"])."<br>";

echo "How did you hear about us?: ".$_POST["enquirysource"]."<p>";
echo "Enquiry Notes: ".str_replace("\n","<br>",$_POST["enquirynotes"])."<p>";

echo "<b>"."Tour Details"."</b>"."<br>";
echo "Tour Guide: ".$_POST["tourguide"]."<br>";
echo "Tour Date & Time: ".$_POST["tourdatetime"]."<br>";
echo "Tour Date & Time - MySQL Format: ";
if ($_POST["tourdatetime"] == "") {echo ""."<br>";} else {echo date("Y-m-d H:i:s",strtotime($_POST["tourdatetime"]))."<p>";};

//*/
?>

