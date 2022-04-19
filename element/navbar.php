<?php 
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="..\bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
	<title>Document</title>
	<style type="text/css">
		.nav{
			
			font-size: 16px;
			font-weight: bold;
		}
		.bg-light {
			background-color: #cfcfcf!important;
		}
		.navbar{
			text-transform: uppercase;
			z-index: 5;
			height: 60px;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;

		}
		/*xử lý menu*/
		.dropdown{
			position: relative;
			display: inline-block;
		}
		.dropdown-content{
			display: none;
			position: absolute;
			z-index: 1;
			background-color: #f5f5f5;
		}
		.dropdown-content a{
			font-size: 14px;
			text-transform: none;
		}
		.dropdown:hover .dropdown-content{
			display: block;
		}
		.nav-logo{
			margin-right: 25px;

		}
		/* logo */
		.text-l{
			font-size: 25px;
			color: black;
		}
		.text-r{
			font-size: 25px;
			color: #cfcfcf;
			background-color: black;
			padding: 0px 5px;
		}
		.logo img{
			width: 60px;
			height: 100%;

		}
		.navbar-nav li a{
			margin: auto 5px;
		}


		.dropdown-content {
			display: none;
			width: 150px;
			position: absolute;
			z-index: 1;
			background-color: #cfcfcf;
		}
		.dropdown-content a{
			font-weight: bold;
			color: rgba(0,0,0,.5);
		}
		.searchbox{
			background-color: #cfcfcf;
			padding: 5px 10px;
			border-radius: 25px;
			margin-right: 5px;
		}
		.searchbox .text-search{
			border: none;
			background: none;
			outline: none;
			font-weight: normal;
			text-transform: none;
		}
		.login{

			border-left: 1px solid silver;
		}
		.login li {
			color: black;
			list-style: none;
			margin-left: 15px;

		}
		.login li a{
			color: black
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container nav">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class=" logo nav-link" href="index.php">
					<span class="text-l">Tune</span>
					<span class="text-r">Source</span>
				</a>
				<ul class="navbar-nav mr-auto">
					<li class="nav-logo nav-item">

						<!-- <a class=" logo" href="#"><img src="image\logo\TuneSource.png" alt=""></a> -->



					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#"> All <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> <span class="glyphicon glyphicon-user"></span>Trending</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> <span class="glyphicon glyphicon-user"></span>New</a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdown">
							Genre
						</a>
						<div class="dropdown-content">
							<a class="dropdown-item" href="#">Rock</a>
							<a class="dropdown-item" href="#">EDM</a>
							<a class="dropdown-item" href="#">Kids</a>
							<a class="dropdown-item" href="#">Dj</a>
							<a class="dropdown-item" href="#">Dance</a>
							<!-- <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a> -->
							</div>
						</li>
					</ul>
					<form action="search.php" method="GET">
						<div class="searchbox">
							<input class="text-search" type="text" placeholder="Search...." name="text-search">
							<input style="width: 0px; height: 0px;border: none;background: none" type="submit" value="">

						</div>
					</form>
					<ul class=" login navbar-nav">
						
						<?php 
						if (isset($_SESSION["fullname"])) { ?>
							<li class="nav-item">
							<a class="nav-link" href="view_cart.php"> <span class="glyphicon glyphicon-user"></span><i class="fas fa-cart-plus"></i></a>
						</li>
							<li class="btn-login nav-item active dropdown">
								<a class="nav-link" href=""><?php echo $_SESSION["fullname"] ?><span class="glyphicon glyphicon-home sr-only">(current)</span></a>
								<div class="dropdown-content">
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
						<?php }else{ ?>
							<li class="btn-login nav-item ">
								<a class="nav-link" href="login.php">login<span class="glyphicon glyphicon-home sr-only">(current)</span></a>
								
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</body>
</html>