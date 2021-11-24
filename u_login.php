<?php
	include('connect.php');
	session_start();
	if (isset($_SESSION['user_user']))
		header("Location: index.php");

	$error = '';
	if(isset($_POST['tosubmit']))
	{
		$myusername = mysqli_real_escape_string($conn, $_POST['login']);
		$mypassword = mysqli_real_escape_string($conn, $_POST['pass']);
		$sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword'";	
		$name = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";	
		$result10 =mysqli_query($conn, $name);
		$row = $result10->fetch_assoc();


		$result =mysqli_query($conn, $sql);#$conn->query($sql); 
		#$count=0;
		// if(!$result || mysqli_num_rows($result) == 0){
		// 	$count = mysqli_num_rows($result);
		// }
		$abc=$row['name'];
		$count = mysqli_num_rows($result);

		if ($count==1)
		{
			$_SESSION['user_user'] = $abc;
			header("Location: index.php");
		} else {
			$error = '<p class="error">Incorrect username or password.</p>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Our Blog :3</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/loginpage.css" rel="stylesheet">
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
					
				</ul>
			</div>
			<div class='welcome'>
				
			</div>
		</nav>

		<!-- Page Header -->
		<br><br>
		<header class="masthead">
			<div class="login-page">
				<div class="form">
					<form action="" method="post" class="login-form">
						<input name="login" id="login" type="text" placeholder="username" />
						<input name="pass" id="pass" type="password" placeholder="password" />
						<?PHP echo $error; ?>
						<input type="submit" name="tosubmit" value="Login" class="but"/>
						</form>
                        <form action="signup.php" method="post" class="login-form">
                        <input type="submit" name="tosign" value="Sign UP" class="but"/>
						</form>
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