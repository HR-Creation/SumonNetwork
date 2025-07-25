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
	<title> Update Info </title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>
<body>

<?php

	include ('ascon.php');

	if (isset($_GET['upvalue'])) {

		$upid=$_GET['upvalue'];		

		$sel="SELECT *FROM complain where sl='$upid' ";
		$que=mysqli_query($con,$sel);

		while ($fudata=mysqli_fetch_array($que)) 
		{
	  		$com=$fudata['comp'];
		}

		$view='<div class="confirm_mes">

				<div class="container">
					<div class="container-fluid">
						<div class="container-sm">

								<div class="entry_form2" style="color: white;">

									<form action="" method="POST">
										<a href="complain_box.php"> 
											<h3 style="position: absolute; color: red; right: 180px; top: 20px; ">X</h3>
										</a>
									  <label style=" font-size:25px;color:black;"> Complain: </label><br>
									  <textarea name="new_com" rows="4" cols="50">'.$com.'</textarea> <br> <br>
									  <button class="sub" name="update">Update</button>
									</form>
								</div>
						</div>
					</div>
				</div>

			</div>' ;

			echo $view;
	};


if (isset($_POST['update'])) {	
		
		$uid=$_GET['upvalue'];

		$new=$_POST['new_com'];
		date_default_timezone_set('Asia/Dhaka');
		$da=date("g:ia M-d");

		$upd="UPDATE complain SET comp='$new\n$da' where sl='$uid' ";

		$que2=mysqli_query($con,$upd);

		if ($que2)
			{	
			    echo "<script>
                window.location='complain_box.php';
                </script>";
			}			

	}

;?>


</body>
</html>