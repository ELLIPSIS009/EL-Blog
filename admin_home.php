<?php
	include('connect.php');
	session_start();
	if (!$_SESSION['log_user'])
		header("location: login_home.php");
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Admin home page</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/navbar.css" rel="stylesheet">
		<link href="css/admin.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
		<nav class='nav_bar'>
			<a class='nav_bar_link' href="index.php">
				<img class ='nav_bar_image' src="img/logo.png" class="logo" alt="">
			</a>
			<div class ='nav_bar_div'>
				<ul class='nav_bar_ul'>
					<li class='nav_bar_li'>
						<a class='nav_bar_elements' href="index.php">Home</a>
					</li class='nav_bar_li'>
					<li class='nav_bar_li'>
						<a class='nav_bar_elements' href="about.php">About  </a>
					</li>
					<li class='nav_bar_li'>
						<a class='nav_bar_elements' href="contact.php">Contact Us</a>
					</li>
					<li class='nav_bar_li'>
						<a class='nav_bar_elements' href="logout.php">Log Out</a>
					</li>
					
				</ul>
			</div>
			<div class='welcome'>
				
			</div>
		</nav>
		<!-- Page Header -->
		<header class="masthead">
			<div class="login-page">
				<div class="first-cont">
					<div class="form">
						<?php
							echo "<h1 style='margin:0 0 25px 0'>Welcome ".$_GET['name']." !</h1><br>"
						?>
                        <a href='admin.php'><input type="submit" value="Add post" class="but"  style='width:60%; border-radius:20px'/></a>
						<a href='edit.php'><input type="submit" value="Edit post" class="but"  style='width:60%; border-radius:20px'/></a>
                        <a href='delete.php'><input type="submit" value="Delete post" class="but"  style='width:60%; border-radius:20px'/></a>
                        <a href='feedback.php'><input type="submit" value="View Feedback" class="but"  style='width:60%; border-radius:20px'/></a>
					</div>
				</div>
			</div>
		</header>
				
		<!-- Footer -->
		<footer><br><br>
			<div class="footer" id="footer">
				<div class="top" style="border-top: 4px white solid;">
					<ul>
						<li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="https://in.linkedin.com//"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="mailto:eldevelopers@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="bottom">
					<div class="b">
						<h6>2021 © EL, All rights reserved.</h6>
					</div>
					<div class="a">
						<h3>Email</h3>
						<h6>eldevelopers@gmail.com</h6>
					</div>
				</div>
			</div>
    	</footer>

	</body>

</html>