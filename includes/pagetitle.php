<?php

include '../includes/auth.php';

$TitleSystemName		= 'Childplan';
$TitleCentreName 		= $_SESSION['CentreName'];
$CentreID				= $_SESSION['CentreID'];
$UserGroupID			= $_SESSION['UserGroupID'];

$PageTitle				= '<title>'.$TitleSystemName.' - '.$TitleCentreName.'</title>';

?>