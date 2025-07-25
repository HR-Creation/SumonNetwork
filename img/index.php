<?php 
include ('../ticket/ascon.php');
$ip=$_SERVER['REMOTE_ADDR'];
$al= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
date_default_timezone_set('Asia/Dhaka');
$time=date("g:ia d-M-Y");

$ins="INSERT INTO hacker (ip,page,time1)
	VALUES ('$ip','$al','$time') ";
$qui=mysqli_query($con,$ins);

	header('Location: ../index.html');
	exit;
;?>