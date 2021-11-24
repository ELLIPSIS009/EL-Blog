<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>About EL</title>
		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Custom styles for this template -->
		<link href="css/aboutpage.css" rel="stylesheet">
		<link href="css/navbar.css" rel="stylesheet">

	</head>

	<body>

		<!-- Navigation -->
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
					<!-- <li class='nav_bar_li'>
						<a class='nav_bar_elements' href="admin.php">Admin</a>
					</li> -->
					<?php
						session_start();
						if (isset($_SESSION['user_user'])){
							echo'   <li class="nav_bar_li">
										<a class="nav_bar_elements" href="logout.php">User Logout</a>
									</li>';
						}
						else if(empty($_SESSION['user_user'])){
							echo'	<li class="nav_bar_li">
										<a class="nav_bar_elements" href="u_login.php">User Login</a>
									</li>';
						}
					?>
				</ul>
			</div>
			<div class='welcome'>
				<?php
					$error = '';
					if (isset($_SESSION['user_user'])){
						$name=$_SESSION['user_user'];
						echo "Welcome ".$name;
						}
              	?>
			</div>
		</nav>

		<!-- Page Header -->
		<header class="masthead">
			<div class="first-cont">
				<div class="post-normal">
					<h3 class="post-title">EL, The creator of this amazing blog 💖</h3>
					<div class="fig">
						<img src="img/poco.png" style="height:100px; width:100px; margin-left:25px; margin-right:25px"></img>
						<img src="img/logo.png" style="height:100px; width:100px; margin-left:25px; margin-right:25px"></img>
						<img src="img/drss.jpeg" style="height:100px; width:100px; margin-left:25px; margin-right:25px; border-radius:50%"></img>
					</div>
					<h3 class="post-content" style="padding-top:0; margin-top:0"><p>At EL Developers we believe there is a better way to write blogs.A more valuable,less invasive way where customers are earned rather than bought.Even though content today is freely available, it is not widely avaialable and is not organized.</p><p>EL Blog was thus founded by our visionary founders Abhinav Mathur, Aryan Sinha and Nimesh Yadav to provide users with curated blog on all fields ranging from Science to Dance.To give people access to a platform where they can read about all they want and freely discuss their opinions.</p>
					</h3>
					<p class="post-meta">Created by us on October, 2021</p>
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
