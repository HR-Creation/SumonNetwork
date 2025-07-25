<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Sumon Network | Admin Login </title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>
<body style="background-image: url('pic/bg6.jpeg');background-size: cover;">

	<?php  include('srch.php'); include ('ascon.php') ;?>

	<div class="Menubar">

		<div class="Navi">

			<ul class="nav">
				<li class="nav-item">
				   <a> <img src="..\img\logo.png"> </a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link active" href="index.php">Home</a>
				  </li>
				   <li class="nav-item">
				    <a class="nav-link" href="entry.php">Add Client</a>
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

	if (isset($_POST['log_in']))
	{
		$ent_name=$_POST['admin_name'];
		$pass=$_POST['password'];

		$sele="SELECT *From admin_info where name='$ent_name' and password= '$pass' ";
		$qui=mysqli_query($con, $sele);
		$cc=mysqli_num_rows($qui);

		while ($sec=mysqli_fetch_array($qui)) {  /* For Security */
			$s_name=$sec['name'];
		}

		if ($cc==1) {
			$_SESSION['session']=$ent_name;
			echo "<script>
            window.location='complain_box.php';
            </script>";
		}
		else {
			echo '<div class="boxitm" style="color:#db2a1a;border-color:#db2a1a;">
				    <strong> Wrong! Name or Password..!! </strong>
				</div>';
		}

		if (!$ent_name==$s_name) {			/* Secure Code */
			$ip=$_SERVER['REMOTE_ADDR'];
			$al= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			date_default_timezone_set('Asia/Dhaka');
			$time=date("g:ia d-M-Y");

			$ins="INSERT INTO hacker (ip,page,time1)
				VALUES ('$ip','$al','$time') ";
			$qui=mysqli_query($con,$ins);

			echo "<script>
            window.location='index.php';
            </script>";
		}
	}

	;?>


	<div class="middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 offset-lg-4">
					<form action="" method="POST"> 
						<label> Admin Login </label> <br>
						<input type="text" name="admin_name" placeholder="Name" required=""> <br> <br>
						<input type="password" name="password" placeholder="Password" required=""> <br> <br>
						<input type="submit" name="log_in" value="Log In" class="button1" style="width: 50%;">
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>