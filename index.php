<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>EL Developers</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Custom styles for this template -->
		<link href="css/navbar.css" rel="stylesheet">
		<link href="css/indexpage.css" rel="stylesheet">
		
		<script type="text/javascript">
			function searchq(){
				var searchTxt = $("input[name='search']").val();
				if(searchTxt != ''){
					document.getElementById('mydiv').style.display = 'block'
					$.post("search.php", {searchVal: searchTxt},function(output){
					$("#mydiv").html(output);
					});
				}
				else{
					document.getElementById('mydiv').style.display = 'none'
				}
			}
		</script>
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
						<a class='nav_bar_elements' href="admin.php">Admin</a>
					</li>
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
						echo "Welcome ".$name .' !';
						}
              	?>
			</div>
		</nav>
		<!-- Page Header -->
		<header class="masthead">
				<div class="first-cont">
					<div class="">
						<div class="site-heading">
							<h1>EL Blog</h1>
							<span class="subheading">The best blog you have ever seen.</span>
						</div>
						<div class='search'>
							<form action="" method="post">
								<br>
								<input type="text" name="search" onkeyup="searchq()" id="output" class='search_bar' placeholder="&#xF002; Search">
							</form>
							<div id="mydiv"></div>
						</div>
						<div class='cat_names'>
							<ul class='cat_ul'>
							<?php
								include('connect.php');
								$sql = 'SELECT * from categories order by id';
								$result = $conn -> query($sql);
								$i = 0;
								$plus = '';
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo $plus . '
										<li class="cat_li"><a href="categ.php?id=' . $row["id"] . '">' . $row['name'] . '</a>
									  	';
									  $i++;
									}
								}
							?>
							</ul>
						</div>
						<div id="godown">
							<a class="js-scroll-trigger" href="#posts"><span></span>Scroll</a>
						</div>
					</div>
				</div>
		</header>
		<div>
			<?php    
				require_once "connect.php";   
				$per_page_record = 4;      
				if (isset($_GET["page"])) {    
					$page  = $_GET["page"];    
				}    
				else {    
					$page=1;    
				}    
				$start_from = ($page-1) * $per_page_record;  
				$query = "SELECT * FROM posts LIMIT $start_from, $per_page_record";     
				$rs_result = mysqli_query ($conn, $query);    
			?>  
	
			<div class="container" id="posts">   
				<br>   
				<div>          
					<?php     
					$i = 0;
					$plus = '';
							while ($row = mysqli_fetch_array($rs_result)) {  
								if ($i > 0)
								$plus = '';
							else
								$plus = '';

							echo  $plus . '	<div class="post-preview card-view">
										<h2 class="post-title">' . $row["title"] . '</h2>
										<div style="display:flex;">
											<a href="countvote.php?id='. $row["id"] .'&check=0"><i class="fa fa-thumbs-up" style="font-size:24px"></i></a>
											<h3 id="upvotecount" style="margin:0 20px 0 7px">'. $row["upvote"]. '</h3>
											<a href="countvote.php?id='. $row["id"] .'&check=1"><i class="fa fa-thumbs-down" style="font-size:24px"></i></a>
											<h3 id="downvotecount" style="margin:0 0 0 7px">'. $row["downvote"]. '</h3>
										</div>
										<h3 class="post-subtitle">' . substr($row["contents"], 0, 300) . '...</h3><br>
										<a href="post.php?id=' . $row["id"] . '" class = "readmore">Read More</a>
										<p class="post-meta"> Posted on : ' . date("d.m.Y", strtotime($row["date_posted"])) . '</p>
									</div>';
							$i++;
							}
							?>     
					<center>
						<div class="pagination">    
							<?php  
								$query = "SELECT COUNT(*) FROM posts";     
								$rs_result = mysqli_query($conn, $query);     
								$row = mysqli_fetch_row($rs_result);     
								$total_records = $row[0];     
								
							echo "</br>";     
								// Number of pages required.   
								$total_pages = ceil($total_records / $per_page_record);     
								$pagLink = "";       
							
								if($page>=2){   
									echo "<a class ='navlink' href='index.php?page=".($page-1)."'>  Prev </a>";   
								}       
										
								for ($i=1; $i<=$total_pages; $i++) {   
								if ($i == $page) {   
									$pagLink .= "<a class ='navlink' class = 'active' href='index.php?page="  
																		.$i."'>".$i." </a>";   
								}               
								else  {   
									$pagLink .= "<a class ='navlink' href='index.php?page=".$i."'>   
																		".$i." </a>";     
								}   
								};     
								echo $pagLink;   
						
								if($page<$total_pages){   
									echo "<a class ='navlink' href='index.php?page=".($page+1)."'>  Next </a>";   
								} 
							?>    
						</div>    
					</center>
				</div>   
			</div>  
		</div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/clean-blog.js"></script>
	</body>

</html>