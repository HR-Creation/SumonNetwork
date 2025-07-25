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
	<title> Messeges </title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
	<script src="boot/js/jquery.min.js"></script>
	<script src="boot/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('pic/bg6.jpeg'); background-repeat: no-repeat;background-size: cover;">

	<div class="Menubar">

			<div class="Navi">

				<ul class="nav">
					<li class="nav-item">
					   <a> <img src="..\img\logo.png"> </a>
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
				    <a class="nav-link active" href="messeges.php">Messeges</a>
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
				      <input type="text" class="form-control" name="search" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				    </div>
				  </form>
				</nav>
			</div>

		</div>

		<div class="messege_box">
			<div class="container">

				<?php

				include ('ascon.php');

				$sele="SELECT *FROM messege where status='1' ";
				$qui=mysqli_query($con,$sele);

				while ($viw=mysqli_fetch_array($qui)) {
					
				 	$sl=$viw['sl'];
				 	$date=$viw['t_d'];
				 	$mail=$viw['mail'];
					$u_name=nl2br(htmlentities($viw['u_nam']));
				 	$name=nl2br(htmlentities($viw['name']));
				 	$sms=nl2br(htmlentities($viw['messege']));

				 	if ($u_name==NULL) {
				 		$u_name="Not an User";
				 	}

				 	$div='<div class="messege_area">
								<div class="row">
									<div class="col-lg-3">
										<h2 class="text-center"> '.$u_name.' </h2>
									</div>
									<div class="col-lg-7">
										<div class="messege">			
											<p> 
												<h3> Name : <span style="font-weight: bold;"> '.$name.' </span> </h3>
												<h5> '.$sms.' </h5>
												<h6> '.$date.' </h6>
												<a href="mailto:'.$mail.'"> Mail-to: '.$mail.' </a>
											</p>
										</div>
									</div>
									<div class="col-lg-2 text-right" style="padding: 50px;">
										<a href="messege_del.php?id='.$sl.' "> <button name="delete" class="button1" style="font-size: 18px;
										padding: 5px 15px; "> Delete </button> </a>
									</div>	
								</div>
							</div>';

						echo @$div;

				 } 

				 	$cc=mysqli_num_rows($qui);
				
					if ($cc==0) {

					echo '<div class="boxitm" style="color:#db2a1a;border-color:#db2a1a;">
							    <strong> Messege Box is Empty..!! </strong>
							</div>';
				}

				;?>

			</div>
		</div>

</body>
</html>