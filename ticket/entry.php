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
	<title>Add Client</title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>
<body style="background-image: url('pic/bg2.jpg'); background-repeat: no-repeat;background-size: cover;">

	<?php include('ascon.php'); include('srch.php') ;?>

	<div class="Menubar">

			<div class="Navi">

				<ul class="nav">
					<li class="nav-item">
					   <a> <img src="..\img\logo.png"> </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="entry.php">Add Client</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="clint_list.php">Client List</a>
					  </li>
					  <li class="nav-item">
				    <a class="nav-link" href="complain_box.php">Complain Ticket</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="messeges.php">Messeges</a>
				  </li>
					  
				</ul>

			</div>

			<div class="search_bar">
			  	 <nav class="navbar navbar-light">
				  <form class="form-inline">
				    <div class="input-group">
				      <div class="input-group-prepend">
				        <span class="input-group-text" id="basic-addon1"><img src="pic\search_ico.png"></span>
				      </div>
				      <input type="text" name="search" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				    </div>
				  </form>
				</nav>
			</div>

		</div>


<?php

	if (isset($_POST['entry'])) {	
		
		$name=$_POST['fname'];
		$phone=$_POST['uphone'];
		$mail=$_POST['umail'];
		$add=$_POST['uadd'];
		$uname=$_POST['uname'];

		$sel="SELECT *FROM client_info where uname='$uname'";
		$que2=mysqli_query($con,$sel);
		$cou=mysqli_num_rows($que2);

		if ($cou>0) {

			echo '<div class="boxitm" style="color:#db2a1a;border-color:#db2a1a;">
				    <strong> Username has Already Exists! </strong>
				</div>';
		}

		else {

			$ins="INSERT INTO client_info (name,phone,email,address,uname) 
			VALUES ('$name','$phone','$mail','$add','$uname')";
			$que=mysqli_query($con,$ins);

			echo '<div class="boxitm">
				    <strong> Entry Successfull..! </strong>
				</div>';
		}
		

	}

;?>


<div class="container">
	<div class="container-fluid">
		<div class="container-sm">

				<div class="entry_form">
					<form action="" method="POST">
					  <label>Name:</label><br>
					  <input type="text" id="#" name="fname" required="" placeholder="Enter Full Name"><br>
					  <label>Contact Number:</label><br>
					  <input type="text" id="#" name="uphone" placeholder="Enter Phone Number"><br>
					  <label>Email:</label><br>
					  <input type="Email" id="#" name="umail" placeholder="Enter E-mail Address"><br>
					  <label>Address:</label><br>
					  <input type="text" id="#" name="uadd" placeholder="Enter Address"><br>
					  <label>User Name:</label><br>
					  <input type="text" id="#" name="uname" required="" placeholder="@username"><br> <br>

					  <button class="sub" name="entry">Submit</button>
					</form>
				</div>
		</div>
	</div>
</div>


</body>
</html>