<?php
	include('connect.php');
	$error = '';
	if (isset($_POST['tosubmit']))
	{
		if (!empty($_POST['content']) && !empty($_POST['subject']) && !empty($_POST['from'])) {
			$stmt = $conn->prepare("INSERT INTO mess (`who`, `subject`, `content`, `sent_time`) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $from, $sub, $cont, $time);
	
			$from = $_POST['from'];
			$sub = $_POST['subject'];
			$cont =  $_POST['content'];
			$time = date("Y/m/d");
			$stmt->execute();
			header("location: index.php");
		}
		
		else
			$error = '<p class="error">Please fill all fields.</p>';
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Title of the post</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/admin.css" rel="stylesheet">
		<link href="css/navbar.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<div class="login-page">
				<div class="first-cont">
					<div class="form">
					<h1 style='margin:0 0 25px 0'>Contact Us!</h1>
						<form acion="" method="post" class="login-form">
							<input name="subject" type="text" placeholder="Subject" />
							<input name="from" type="text" placeholder="From" />
							<textarea name="content" type="text" placeholder="Content" class="cont-in"></textarea>
							<?PHP echo $error; ?>
							<input type="submit" name="tosubmit" value="Send!" class="but"/>
						</form>
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
