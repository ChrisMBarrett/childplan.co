<?php

//$dobdate = mysql_real_escape_string($_POST["childsdob"]);

echo 'Hello'."<br>";

echo "Enquirer's Name is: ".$_POST["enquirername"]."<br>";
echo "Enquirer's Contact Number: ".$_POST["contactphone"]."<br>";
echo "Enquirer's Contact Email: ".$_POST["contactemail"]."<br>";
echo "Children's Details"."<br>";
echo "Number of Children: ".$_POST["numberofchildren"]."<br>";
echo "Child's Name: ".$_POST["childsname"]."<p>";

echo "Child's DOB: ".$_POST["childsdob"]."<br>";
echo "Child's DOB - MySQL Format: "; 

if ($_POST["childsdob"] == "") {echo ""."<br>";} else {echo date("Y-m-d",strtotime($_POST["childsdob"]))."<p>";}

//else {echo date("Y-m-d",strtotime($_POST["childsdob"]))}; echo "<p>";

echo "How did you hear about us?: ".$_POST["enquirysource"]."<p>";
echo "Enquiry Notes: ".str_replace("\n","<br>",$_POST["enquirynotes"])."<p>";

echo "Tour Date & Time: ".$_POST["tourdatetime"]."<br>";
echo "Tour Date & Time - MySQL Format: ";
if ($_POST["tourdatetime"] == "") {echo ""."<br>";} else {echo date("Y-m-d H:i:s",strtotime($_POST["tourdatetime"]))."<p>";};


?>

