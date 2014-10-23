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

// First Childs Details
$Child1sName		= $_POST["child1sname"];
$Child1sGender		= $_POST["child1sgender"];
$Child1sDOB			= date('Y-m-d',strtotime($_POST["child1sdob"]));

$Child1DOW			= $_POST["daysofweek"];
$Child1DOWInsert	= implode($Child1DOW);

$Child1NumberDOW	= count($_POST["daysofweek"]);

$EnquiryNotes		= $_POST["enquirynotes"];

// Tour Information
$TourDateTime		= date('Y-m-d H:i:s',strtotime($_POST["tourdatetime"]));
$TourGuide			= $_POST["tourguide"];

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
	,NOW() 
	)
";
					
mysqli_query($conn, $EnquiryAddSQL ) or die(mysqli_error($conn));


// Get the Insert ID of the Enquiry
$EnquiryID = $conn->insert_id;
//Echo 'Success? - '.$EnquiryID;


// Add Values to the Enquiry History Table
$EnquiryHistoryAddSQL = "
INSERT INTO
	tblEnquiryHistory
	(
	 EnquiryID
	,CentreID
	,FirstChildsName
	,FirstChildsGenderID
	,FirstChildsDOB
	,FirstChildsDoWRequested
	,FirstChildsNumberOfDaysRequested
	,EnquiryNotes
	,AddedByUserID
	,DateTimeAdded
	)
VALUES
	(
	 $EnquiryID
	,$CentreID
	,'$Child1sName'
	,$Child1sGender
	,'$Child1sDOB'
	,'$Child1DOWInsert'
	,$Child1NumberDOW
	,'$EnquiryNotes'
	,$UserID
	,Now()
	)
";
					
mysqli_query($conn, $EnquiryHistoryAddSQL ) or die(mysqli_error($conn));

// Add the Tour Information (if one was select)

If($TourGuide != ""){

// Add Values to the Enquiry Table
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
	,NOW() 
	)
";
					
mysqli_query($conn, $TourAddSQL ) or die(mysqli_error($conn));	
$conn->commit();
}
else
{
// Commite the 2 Query results (excluding the tours)
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

