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

	if (isset($_GET['update_get_id'])) {

		$upid=$_GET['update_get_id'];		

		$sel="SELECT *FROM client_info where sl='$upid' ";
		$que=mysqli_query($con,$sel);

		while ($fudata=mysqli_fetch_array($que)) 
		{
	  		$dname=$fudata['name'];
	  		$dphone=$fudata['phone'];
	  		$dmail=$fudata['email'];
	  		$dadd=nl2br($fudata['address']);
	  		$duname=$fudata['uname'];
		}

		$view='<div class="confirm_mes">

				<div class="container">
					<div class="container-fluid">
						<div class="container-sm">

								<div class="entry_form2" style="color: white;">

									<form action="" method="POST">
										<a href="clint_list.php"> 
											<h3 style="position: absolute; color: red; right: 180px; top: 20px; ">X</h3>
										</a>
									  <label>Name:</label><br>
									  <input type="text" id="#" name="fname" value='.$dname.'><br>
									  <label>Contact Number:</label><br>
									  <input type="text" id="#" name="uphone" value='.$dphone.'><br>
									  <label>Email:</label><br>
									  <input type="Email" id="#" name="umail" value='.$dmail.'><br>
									  <label>Address:</label><br>
									  <textarea name="uadd" rows="1" cols="51">'.$dadd.' </textarea> <br>
									  <label>User Name:</label><br>
									  <input type="text" id="#" name="uname" value='.$duname.'><br> <br>

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
		
		$uid=$_GET['update_get_id'];

		$name=$_POST['fname'];
		$phone=$_POST['uphone'];
		$mail=$_POST['umail'];
		$add=$_POST['uadd'];
		$uname=$_POST['uname'];

		$upd="UPDATE client_info SET name='$name' , phone='$phone' , email='$mail' , address='$add' , uname='$uname' where sl='$uid' ";

		$que2=mysqli_query($con,$upd);

		if ($que2)
			{	
			    echo "<script>
                window.location='clint_list.php';
                </script>";
			}			

	}

;?>


</body>
</html>