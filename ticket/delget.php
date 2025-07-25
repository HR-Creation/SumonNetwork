<?php 
session_start();
$secure=$_SESSION['session'];
if (!isset($secure)) {
	echo "<script>
    window.location='index.php';
    </script>";
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Confirmation </title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>
<body style="background-image: url('pic/bg5.jpg'); background-repeat: no-repeat;background-size: cover;">

<?php 

include ('ascon.php');

if (isset($_GET['delete_get_id'])) {

	$viid=$_GET['delete_get_id'];

	$sel="SELECT *FROM client_info where sl='$viid' ";
	$que=mysqli_query($con,$sel);

	while ($view=mysqli_fetch_array($que)) 
	{
		$uname=$view['uname'];
	}


	echo '<div class="confirm_mes">
			    <div class="del_conf">

				  	<form action="" method="POST">

				  		Are you sure that you want to Permanently Remove <span style="color: #0073ff;"> '.$uname.' </span> from your Client List? <br>
				  		<button class="N_del" name="no_d"> Cancel </button> <button class="Y_del" name="yes_d"> Delete </button>
								
					</form>

				</div>
			</div>' ;

}


if (isset($_POST['yes_d'])) {

	$delid=$_GET['delete_get_id'];

	$delitm="DELETE FROM client_info where sl='$delid' ";

	$que3=mysqli_query($con,$delitm);

	if ($delitm) {

		echo "<script>
        window.location='clint_list.php';
        </script>";
	}

}

if (isset($_POST['no_d'])) {

	echo "<script>
        window.location='clint_list.php';
        </script>";
}

;?> 


</body>
</html>


