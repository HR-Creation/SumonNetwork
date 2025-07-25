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

<body style="background-image: url('pic/bg4.jpg'); background-repeat: no-repeat;background-size: cover;">

	<?php include('ascon.php');?>

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
				    <a class="nav-link" href="messeges.php">Messeges</a>
				  </li>
					  
				</ul>

			</div>

	</div>


		<div>
			<a href="complain_box.php"> 
			 	<button class="switch_button" id="switch_but"> Go Back </button>
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
									<th style="width: 15%;">Username</th>
									<th style="width: 20%;">Date of Adding</th>
									<th style="width: 40%;">Complain</th>									
									<th style="width: 20%;">Date of Close</th>
								</tr>
							</thead>

							<tbody>

								<?php

								$sel2="SELECT *FROM complain where status = '1' " ;

								$que2=mysqli_query($con,$sel2);

								$sln2=1;														
								
							  	while ($ddata2=mysqli_fetch_array($que2)) 
							  	{
							  		$slid=$ddata2['sl'];
							  		$complaina=nl2br($ddata2['comp']);
							  		$duname2=$ddata2['cuname'];
							  		$adddate=$ddata2['adate'];
							  		$closedate=$ddata2['cdate'];

							  		@$tble2.='<tr>
							  				  <td> '.$sln2++.' </td>
										 	  <td style="font-family: Century Schoolbook; color: #0073ff; font-size:22px;">'.$duname2.'
										 	  </td>
										 	  <td> '.$adddate.' </td>
										 	  <td style="color: #f03a3a; font-size:20px;">'.$complaina.'
										 	  </td>
										 	  <td> '.$closedate.' </td>									      
										    </tr>';								 

							  	}

							  	echo @$tble2;

								  	@$nouser=count($duname2);
								  	
								  	if ($nouser==0) {

								  		echo '<tr>
						  				  <td></td>
									 	  <td></td>
									 	  <td></td>
									      <td style="text-align: center; font-weight: bold; color:#187016; margin-bottom:10px;" > Closed Item is Empty..!!</td>
									      <td> </td>								
									    </tr>';
								  	}

								;?>
					
							</tbody>
							
						</table>

					</div>
				</div>
			</div>
		</div>

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