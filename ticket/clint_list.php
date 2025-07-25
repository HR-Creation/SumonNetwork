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
	<title>Clint List</title>
	<link rel="icon" href="../img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/styl.css">
	<link rel="stylesheet" type="text/css" href="boot\css\bootstrap.min.css">
</head>

<body style="background-image: url('pic/bg1.jpg'); background-repeat: no-repeat;background-size: cover;">

	<?php include('ascon.php'); include('srch.php') ;?>

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
					    <a class="nav-link active" href="clint_list.php">Client List</a>
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
				      <input type="text" class="form-control" name="search" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				    </div>
				  </form>
				</nav>
			</div>

		</div>

		<div class="Table1">

				<table class="table table-dark" style="text-align: center;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">User Name</th>
				      <th scope="col">Client Name</th>
				      <th scope="col">Phone</th>
				      <th scope="col">Email</th>
				      <th scope="col">Address</th>
				      <th scope="col">Options</th>      
				      
				    </tr>
				  </thead>

				  <tbody>

				  	<?php
	
				  	/* For Search Result */

				  	if(isset($_GET['search_id'])){

						$fs=$_GET['search_id'];

						$sel2="SELECT *FROM client_info where uname='$fs'";

						$que2=mysqli_query($con,$sel2);

						$sln2=1;
						$uni2=uniqid();
						
					  	while ($ddata2=mysqli_fetch_array($que2)) 
					  	{
					  		$slid2=$ddata2['sl'];
					  		$dname2=$ddata2['name'];
					  		$dphone2=$ddata2['phone'];
					  		$dmail2=$ddata2['email'];
					  		$dadd2=$ddata2['address'];
					  		$duname2=$ddata2['uname'];

					  		@$tble2.='<tr>
					  				  <td> '.$sln2++.' </td>					  				
								 	  <td>'.$duname2.'</td>
								      <td>'.$dname2.'</td>
								      <td>'.$dphone2.'</td>
								      <td>'.$dmail2.'</td>
								      <td>'.$dadd2.'</td>
								      <td>
								      	<a href="upvalue.php?update_get_id='.$slid2.'$'.$uni2.' "> 
								      		<button class="edit"> Edit </button>
								      	</a>
				      				  	<a href="delget.php?delete_get_id='.$slid2.'$'.$uni2.' "> 
				      				  		<button class="delete"> Delete </button>
				      				  	</a>
								      </td>
								    </tr>';								 

					  	} 

					  	echo @$tble2;

							  	@$nouser2=count($dname2);
							  	
							  	if ($nouser2==0) {

							  		echo '<tr>
					  				  <td></td>
								 	  <td></td>
								      <td style="text-align: center; font-weight: bold; color:red; margin-bottom:10px;" > NO USER FOUND..!!</td>
								      <td></td>
								      <td></td>
								      <td></td>
								      <td></td>
								    </tr>';
							  	}
			  		}
			  	
			  		/* View all Client List */

					else {

					  	$sel="SELECT *FROM client_info";

					  	$que=mysqli_query($con,$sel);

					  	$sln=1;
					  	$uni=uniqid(); 

					  	while ($ddata=mysqli_fetch_array($que)) 
					  	{
					  		$slid=$ddata['sl'];
					  		$dname=$ddata['name'];
					  		$dphone=$ddata['phone'];
					  		$dmail=$ddata['email'];
					  		$dadd=$ddata['address'];
					  		$duname=$ddata['uname'];

					  		@$tble.='<tr>
					  				  <td> '.$sln++.' </td>
								 	  <td>'.$duname.'</td>
								      <td>'.$dname.'</td>
								      <td>'.$dphone.'</td>
								      <td>'.$dmail.'</td>
								      <td>'.$dadd.'</td>
								      <td>
								      	<a href="upvalue.php?update_get_id='.$slid.'$'.$uni.' "> 
								      		<button class="edit"> Edit </button>
								      	</a>
				      				  	<a href="delget.php?delete_get_id='.$slid.'$'.$uni.' "> 
				      				  		<button class="delete"> Delete </button>
				      				  	</a>
								      </td>
								    </tr>';
					  	}

					  	echo @$tble; 

					  	@$nouser=count($dname);
							  	
					  	if ($nouser==0) {

					  		echo '<tr>
			  				  <td></td>
						 	  <td></td>
						      <td style="text-align: center; font-weight: bold; color:red; margin-bottom:10px;" > Client List is Empty..!!</td>
						      <td></td>
						      <td></td>
						      <td></td>
						      <td></td>
						    </tr>';
					  	}

					  }

				  	;?>
				    
				  </tbody>

				</table>

		</div>

</body>
</html>