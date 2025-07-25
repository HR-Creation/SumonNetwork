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
	<title>Complain Ticket</title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>

<body style="background-image: url('pic/bg4.jpg'); background-repeat: no-repeat;background-size: cover; scroll-behavior: smooth;">

	<?php include('ascon.php') ;?>

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
				    <a class="nav-link active" href="complain_box.php">Complain Ticket</a>
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

	/* For ADD Complain */

	if (isset($_POST['submit'])) {

			@$unam=$_POST['unam'];
		 	$ucom=$_POST['comp'];
		 	date_default_timezone_set('Asia/Dhaka');
			$tarikh=date("g:ia d-M-Y");

		 	$ss="SELECT *FROM client_info where uname='$unam' ";
		 	$q2=mysqli_query($con,$ss);
		 	$cc=mysqli_num_rows($q2);

		 	while ($dd=mysqli_fetch_array($q2)) 
		 	{
		 		@$ddname=$dd['uname'];
		 	}

		 	if ($cc>0) 
		 	{		 
				$ins="INSERT INTO complain (cuname,comp,adate) VALUES ('$ddname','$ucom','$tarikh') ";
				$que=mysqli_query($con,$ins);

				echo '<div class="boxitm">
						    <strong> Add Complain Successfull..!! </strong>
						</div>';
			}
			else
			{
				echo '<div class="boxitm" style="color:#db2a1a;border-color:#db2a1a;">
						    <strong> Username Does Not Found..!! </strong>
						</div>';
			}
			
	}	


		/* For Close Complain */

		if (isset($_GET['d$sl@yahoo!id'])) {

				$did=$_GET['d$sl@yahoo!id'];
				date_default_timezone_set('Asia/Dhaka');
			    $tarikh2=date("g:ia d-M-Y");

				$del="UPDATE complain SET status='1' , cdate='$tarikh2' where sl='$did' ";
				$quire=mysqli_query($con,$del);

				if ($quire) {
					
					echo '<div class="boxitm" style="width:245px;">
						    <strong> Moved to Closed Item..!! </strong>
						</div>';
				}

		}


		;?>

		<div> 
			<a href="complain_list.php"> 
				<button class="switch_button" id="switch_but"> Closed Item </button> 
			</a>  
		</div>

		<div class="container">
			<div class="contailer-fluid">
				<div class="container-sm">
					<div class="complain_box">
						
						<table>
							<thead>
								<tr>
									<th style="width: 5%;">#</th>
									<th style="width: 20%;">Username</th>
									<th style="width: 50%;">Complain</th>
									<th style="width: 20%;">Date of Adding</th>
									<th style="width: 10%"></th>
								</tr>
							</thead>

							<tbody>

								<?php

								/* For Search Complain */

								if(isset($_GET['search'])){

									$fs3=$_GET['search'];

									$sel3="SELECT *FROM complain where cuname='$fs3' and status='0' ";

									$que3=mysqli_query($con,$sel3);

									$sln3=1;
									
								  	while ($ddata3=mysqli_fetch_array($que3)) 
								  	{
								  		$slid3=$ddata3['sl'];
								  		$complaina3=nl2br($ddata3['comp']);
								  		$duname3=$ddata3['cuname'];
								  		$dadate3=$ddata3['adate'];

								  		@$tble3.='<tr>
								  				  <td> '.$sln2++.' </td>
											 	  <td style="font-family: Century Schoolbook; color: #0073ff; font-size:22px;"> '.$duname3.'
											 	  </td>
											 	  <td style="color: #f03a3a; font-size:20px;">'.$complaina3.'
											 	  </td>
											 	  <td>'.$dadate3.'</td>									      
											      <td> 
											      	<a href="complain_box.php?d$sl@yahoo!id='.$slid3.'"> <button class="solve">Close</button> </a>
											      	<a href="upcom.php?upvalue='.$slid.' "> <button class="edit">Edit</button> </a> 
											      </td>
											    </tr>';							 

								  	} 

								  	echo @$tble3;

										  	@$nouser3=count($duname3);
										  	
										  	if ($nouser3==0) {

										  		echo '<tr>
									  				  <td></td>
												 	  <td></td>
												      <td style="text-align: center; font-weight: bold; color:red; margin-bottom:10px;" > NO USER FOUND..!!</td>
									      			<td></td>								      			
									
												    </tr>';
										  	}
								}

								else {

									/* All Complian View */

									$sel2="SELECT *FROM complain where status='0'";

									$que2=mysqli_query($con,$sel2);

									$sln2=1;													
									
								  	while ($ddata2=mysqli_fetch_array($que2)) 
								  	{
								  		$slid=$ddata2['sl'];
								  		$complaina=nl2br($ddata2['comp']);
								  		$duname2=$ddata2['cuname'];
								  		$dadate2=$ddata2['adate'];

								  		@$tble2.='<tr>
								  				  <td> '.$sln2.' </td>
											 	  <td style="font-family: Century Schoolbook; color: #0073ff; font-size:22px;">'.$duname2.'
											 	  </td>
											 	  <td style="color: #f03a3a; font-size:20px;">'.$complaina.'
											 	  </td>
											 	  <td>'.$dadate2.'</td>									      
											      <td> 
											      	<a href="complain_box.php?d$sl@yahoo!id='.$slid.'"> <button class="solve">Close</button> </a>
											      	<a href="upcom.php?upvalue='.$slid.' "> <button class="edit">Edit</button> </a>
											      </td>
											    </tr>';

										 $sln2++;									 

								  	}

								  	echo @$tble2;

									  	@$nouser=count($duname2);
									  	
									  	if ($nouser==0) {

									  		echo '<tr>
							  				  <td></td>
										 	  <td></td>
										      <td style="text-align: center; font-weight: bold; color:#187016; margin-bottom:10px;" > Complain Box is Empty..!!</td>
										      <td></td>
										      <td></td>
										    </tr>';
									  	}
								}

								;?>
					
							</tbody>
							
						</table>						

					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="contailer-fluid">
				<div class="container-sm">
					<div class="d-flex justify-content-center">
						<div class="add_but">

							<button onclick="on()" class="add_com">Add Complain</button>

						</div>
					</div>					
				</div>
			</div>
		</div>


<div id="overlay">
    <div id="text">
	  	<form action="" method="POST">
			<label> Username: </label>
			<input type="text" name="unam" placeholder="@Username"> <br> <br>
			<label> Complain: </label> 
			<input type="text" name="comp" placeholder="Enter Complain"> <br> <br>
			<input class="submit" type="submit" name="submit" onclick="off()" value="Add Complain">			
		</form>
		<h2 onclick="off()" style="position: fixed; top: -90%; right: -50%;"> X </h2>
	</div>
</div>


<script>

	function on() {
	  document.getElementById("overlay").style.display = "block";
	}

	function off() {
	  document.getElementById("overlay").style.display = "none";
	}

</script>

<script>

    window.onscroll = function() {myFunction()};

	function myFunction() {
	  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
	    document.getElementById("switch_but").className = "sbjava";
	  } else {
	    document.getElementById("switch_but").className = "switch_button";
	  }
	}

</script>

</body>
</html>