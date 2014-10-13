<?php

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

$test = $url["host"];

if(!empty($test))
{
	$server 	= $url["host"];
	$username 	= $url["user"];
	$password 	= $url["pass"];
	$db 		= substr($url["path"],1);
    
	$conn = mysqli_connect($server,$username,$password);

	mysqli_select_db($db);
	
} 
else
{
	 $conn = mysqli_connect("127.0.0.1","ChrisB","W!zard","childplan201409");
}
     
?>