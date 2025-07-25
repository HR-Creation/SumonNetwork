<?php  
include ('ascon.php');
if (isset($_GET['id'])) {
	
	$sl_id=$_GET['id'];

	$del="UPDATE messege SET status='2' where sl='$sl_id' ";
	$quire=mysqli_query($con,$del);

	header('Location: messeges.php');
}

;?>