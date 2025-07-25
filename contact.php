<!DOCTYPE html>
<html>
<head>
	<title> Contact With Us | Sumon Network </title>
	<link rel="icon" href="img/logo-round.png">
	<link rel="stylesheet" type="text/css" href="boot/css/morphext.css">
	<link rel="stylesheet" type="text/css" href="boot/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="boot/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boot/css/design.css">
	<link rel="stylesheet" type="text/css" href="boot/css/new.css">
	<!--**************************************************************************** -->
	<link href='https://fonts.googleapis.com/css?family=Concert One' rel="stylesheet">
 	<link href='https://fonts.googleapis.com/css?family=Amaranth' rel="stylesheet">	
 	<link href='https://fonts.googleapis.com/css?family=Carter One' rel='stylesheet'>	
 	<link href='https://fonts.googleapis.com/css?family=Cherry Swash' rel='stylesheet'>	
 	<link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>	
 	<link href='https://fonts.googleapis.com/css?family=Crete Round' rel='stylesheet'>
 	<link href='https://fonts.googleapis.com/css?family=Courier Prime' rel='stylesheet'>
 	<link href='https://fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
 	<link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>
 	<!--**************************************************************************** -->
	<script src="boot/js/jquery.min.js"></script>
	<script src="boot/js/all.min.js"></script>
	<script src="boot/js/bootstrap.min.js"></script>
	<script src="boot/js/custom.js"></script>	
</head>
<body>

<header style="background-color: rgba(10,0,50,0.1);">

	<div class="mainNav">	

		<nav class="navbar navbar-expand-lg navbar-light">

		  	<a class="navbar-brand" href="index.html"> <img id="myImage" src="img/logo.png" class="img-fluid" alt="Logo.png"> </a>

		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="mr-auto">		      	
			    </ul>

		    	<div class="form-inline my-2 my-lg-0">
		    		<ul class="navbar-nav">

				      	<li class="nav-item">
				        	<a class="nav-link" href="index.html"> Home </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="service.html"> Services </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="movieserver/index.html"> Movie Server </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="movieserver/live_tv.html"> Live TV </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="packages.html"> Packages </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="coverage_area.html"> Coverage Area </a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="about.html"> About </a>
				      	</li>
				      	<li class="nav-item active">
				        	<a class="nav-link" href="contact.php"> Contact <span class="sr-only">(current)</span> </a>
				      	</li>

				      	<button onclick="payment()" id="payment" class="button1"> Payment </button>
				      	
			      	</ul>
		    	</div>
		  </div>

		</nav>

	</div>

<?php  

include ('ticket/ascon.php');

if (@$_GET['mes']) {
	echo '<div class="boxitm">
		    <strong> Messege Send..!!
		    You will Receive a E-Mail from Us. </strong>
		</div>';
}

if (isset($_POST['submit'])) {

	$name=$_POST['name'];
	$u_name=$_POST['uname'];	
	$sms=$_POST['messege'];
	$email=$_POST['email'];
	
	date_default_timezone_set('Asia/Dhaka');
	$time=date("g:ia d-M");

	$ins="INSERT INTO messege (u_nam,name,mail,messege,t_d,status) 
		VALUES ('$u_name', '$name', '$email', '$sms', '$time', '1') ";
	$qui=mysqli_query($con,$ins);

		if ($qui) {		
			echo "<script>
		    window.location='contact.php?mes=1';
		    </script>";
		}
		else
		{
			echo '<div class="boxitm" style="color:#db2a1a;border-color:#db2a1a;">
					    <strong> Messege Does not Sended..!! </strong>
					</div>';
		}
	}
?>

<div class="btrc">
	    <div class="line">
	       <a href="img/ekrate.png"> BTRC Approved Tariff! </a>
	    </div>
</div>

	<div class="contact_area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<h5> Contact Us </h5>
					<h1> <span style="font-weight: bold;"> Stay In Touch </span> with US </h1>
					<h4> Let US Know , What you Feel!</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 text-center">
					<div class="content">
						<i class="fas fa-map-marker-alt fa-3x"> </i> <br> <br>
						<h3> Address :</h3> 
						<div style="margin-top: 15px; font-size: 20px;"> Ka-71, South Area, Mohakhali, Banani, Dhaka-1212 </div>						
					</div>
				</div>
				<div class="col-lg-4 text-center">
					<div class="content">
						<i class="fas fa-mobile-alt fa-3x"></i> <br> <br>
						<h3> Phone Number :</h3>
						<div style="margin-top: 15px; font-size: 20px;"> 01625-553964 <br>
							01302-950066 <br>
							<span class="hot"> HOT-LINE : 01302-950070 </span> </div>						
					</div>
				</div>
				<div class="col-lg-4 text-center">
					<div class="content">
						<i class="far fa-clock fa-3x"></i> <br> <br>
						<h3> Office Hours :</h3>
						<div style="margin-top: 15px; font-size: 20px;"> Saturday - Thursday 10:00 AM - 9:00 PM </div>						
					</div>
				</div>
			</div>
		</div>
	</div>

</header>

<section style="background: linear-gradient(-90deg, #0c3366 10%, #0c5766 100%); color: white; padding-bottom:50px;">
	<div class="message" id="messege">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="head">
						<h5> Contact Us </h5>
						<h1> <span style="font-weight: bold;"> Send A Message </span> </h1>	
						<h4> If You Have any Question Feel Free to Ask..!</h4>
					</div>
					<form action="" method="POST">
						<input type="text" name="name" placeholder="Name" required=""> <br> <br>
						<input type="text" name="uname" placeholder="USER_ID"> <br> <br>
						<input type="text" name="email" required="" placeholder="Phone or E-mail"> <br> <br>
						<textarea rows="5" cols="55" name="messege" required="" placeholder="Messege"></textarea> <br> <br>
						<button class="button2" type="submit" name="submit"> SEND </button>
					</form>
				</div>
				<div class="col-lg-6">
					<div class="sms-img">
						<img src="img/png1.png" class="img-fluid" alt="SmS.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<? include ("footer.php") ?>

<script>

	$(window).scroll(function() {

	var top = $(window).scrollTop();
	
	var top = $(window).scrollTop();

	if (top > 35) {
		$(".mainNav").addClass("nav_fixed");
		$("nav").addClass("navbar-dark");
		$(".btrc").css('padding-top','100px');
		document.getElementById('myImage').src='img/logo2.png';
	} else {
		$(".mainNav").removeClass("nav_fixed");
		$("nav").removeClass("navbar-dark");
		$(".btrc").css('padding-top','');
		document.getElementById('myImage').src='img/logo.png';
	}
	
	if (top > 880) {
		$(".message .sms-img").css('display','block');
	} 
	else {
		$(".message .sms-img").css('display','none');
	}

});

</script>


</body>
</html>