<?php

include('../includes/pagetitle.php');
include('../includes/DBConnect.inc');

// Collect All the Variables
$UserID						= $_SESSION['UserID'];
$CentreID					= $_SESSION['CentreID'];

$EnquirerName 				= $_POST["enquirername"];
$EnquirerPhone				= $_POST["contactphone"];
$EnquirerEmail				= $_POST["contactemail"];
$EnquiryDate				= date('Y-m-d',strtotime($_POST["enquirydate"]));

$NumberOfChildren			= $_POST["numberofchildren"];

$EnquirySource				= $_POST["enquirysource"];

// First Childs Details
$Child1sName				= $_POST["child1sname"];
$Child1sGender				= $_POST["child1sgender"];

// First Childs DOB
if (empty($_POST["child1sdob"]))
 {      
   $Child1sDOBInsert = NULL;
 }
 else
 {
   $Child1sDOBInsert = date('Y-m-d',strtotime($_POST["child1sdob"]));
//   $child1sDOBinsert = date("Y-m-d H:i:s", $Date1);
 }

// Surround it in quotes if it isn't NULL.
if ($Child1sDOBInsert === NULL) {
  // Make a string NULL with no extra quotes
  $Child1sDOBInsert = 'NULL';
}
// For non-null values, surround the existing value in quotes...
else $Child1sDOBInsert = "'$Child1sDOBInsert'";


$Child1DOW					= $_POST["daysofweek"];
$Child1DOWInsert			= implode($Child1DOW);

$Child1NumberDOW			= count($_POST["daysofweek"]);

// First Childs Requested Start Date
if (empty($_POST["child1startdate"]))
 {      
   $Child1sIdealStartDateInsert = NULL;
 }
 else
 {
   $Child1sIdealStartDateInsert = date('Y-m-d',strtotime($_POST["child1startdate"]));
//   $child1sDOBinsert = date("Y-m-d H:i:s", $Date1);
 }

// Surround it in quotes if it isn't NULL.
if ($Child1sIdealStartDateInsert === NULL) {
  // Make a string NULL with no extra quotes
  $Child1sIdealStartDateInsert = 'NULL';
}
// For non-null values, surround the existing value in quotes...
else $Child1sIdealStartDateInsert = "'$Child1sIdealStartDateInsert'";

// Enquiry Notes
$EnquiryNotes				= $_POST["enquirynotes"];

// Tour Information
$TourDateTime				= date('Y-m-d H:i:s',strtotime($_POST["tourdatetime"]));
$TourGuide					= $_POST["tourguide"];

/*
If ($TourGuide != ""){
echo "There's a tour to enter"."<br>"."Date & Time = ".$TourDateTime."<br>"."Tour Guide = ".$TourGuide;
}
else
{
echo	"boo - no tour :(";
	
}
//echo "Tour Date & Time: ".$TourDate."<br>"."Tour Guide is: ".$TourGuide;
exit;
*/

// Process the records to the database

$conn->autocommit(FALSE);

// Add Values to the Enquiry Table
$EnquiryAddSQL = "
INSERT INTO
	tblEnquiry
	(
	CentreID 
	,EnquirerName 
 	,EnquiryPhoneNumber
	,EnquiryEmailAddress
	,NumberOfChildren
	,EnquirySourceID 
	,EnquiryStatusID
	,EnquiryType 
	,EnquiryDate
	,AddedByUserID
	,EnquiryAddedDateTime 
	)
VALUES
	(
	$CentreID 
 	,'$EnquirerName' 
	,'$EnquirerPhone' 
	,'$EnquirerEmail' 
	,$NumberOfChildren 
	,$EnquirySource 
	,1
	,1					-- 1 = User Entered 
	,'$EnquiryDate'
	,$UserID
	,UTC_TIMESTAMP() 
	)
";
					
mysqli_query($conn, $EnquiryAddSQL ) or die(mysqli_error($conn));


// Get the Insert ID of the Enquiry that has just been added in the previous step
$EnquiryID = $conn->insert_id;

// Add Values to the Enquiry History Table
$EnquiryHistoryAddSQL = "
INSERT INTO
	tblEnquiryHistory
	(
	 	EnquiryID
	,	CentreID
	,	FirstChildsName
	,	FirstChildsGenderID
	,	FirstChildsDOB
	,	FirstChildsDoWRequested
	,	FirstChildsNumberOfDaysRequested
	,	FirstChildsRequestedStartDate
	,	EnquiryNotes
	,	AddedByUserID
	,	DateTimeAdded
	)
VALUES
	(
	 	$EnquiryID
	, 	$CentreID
	, 	'$Child1sName'
	, 	$Child1sGender
	, 	$Child1sDOBInsert
	, 	'$Child1DOWInsert'
	, 	$Child1NumberDOW
	,	$Child1sIdealStartDateInsert
	, 	'$EnquiryNotes'
	, 	$UserID
	, 	UTC_TIMESTAMP()
	)
";
					
mysqli_query($conn, $EnquiryHistoryAddSQL ) or die(mysqli_error($conn));

// Add the Tour Information (if one was select)

If($TourGuide != ""){

// Add Values to the Tours Table
$TourAddSQL = "
INSERT INTO
	tblTours
	(
	CentreID 
	,EnquiryID
 	,TourWithUserID
	,TourDateTime
	,AddedByUserID
	,DateTimeAdded
	)
VALUES
	(
	$CentreID 
	,$EnquiryID
	,$TourGuide
	,'$TourDateTime'
	,$UserID
	,UTC_TIMESTAMP() 
	)
";
					
mysqli_query($conn, $TourAddSQL ) or die(mysqli_error($conn));	
$conn->commit();
}
else
{
// Commit the 3 Queries results (excluding the tours)
$conn->commit();
}

header("Location: /enquiries/")

/*

echo "Centre ID: ".$CentreID."<p>";
echo "<b>"."Enquirer Details"."</b>"."<br>";
echo "Enquirer's Name is: ".$_POST["enquirername"]."<br>";
echo "Enquirer's Contact Number: ".$_POST["contactphone"]."<br>";
echo "Enquirer's Contact Email: ".$_POST["contactemail"]."<p>";
echo "<b>"."Children's Details"."</b>"."<br>";
echo "Number of Children: ".$_POST["numberofchildren"]."<br>";
echo "Child's Name: ".$_POST["childsname"]."<br>";
echo "Child's Gender: ".$_POST["gender"]."<br>";
echo "Child's DOB: ".$_POST["childsdob"]."<br>";
echo "Child's DOB - MySQL Format: "; 

if ($_POST["childsdob"] == "") {echo ""."<p>";} else {echo date("Y-m-d",strtotime($_POST["childsdob"]))."<p>";}

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

*/
?>

