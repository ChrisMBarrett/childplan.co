<?php

include '../includes/auth.php';

$TitleSystemName		= 'Childplan';
$TitleCentreName 		= $_SESSION['CentreName'];
$CentreID				= $_SESSION['CentreID'];

$PageTitle				= '<title>'.$TitleSystemName.' - '.$TitleCentreName.'</title>';

?>