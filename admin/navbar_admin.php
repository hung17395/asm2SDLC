
<?php @session_start(); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="..\bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<style>
		*{
			margin: 0;
			padding: 0;
			font-size: 16px;
		}
		ul{
			list-style-type: none
		}
		.bg-light {
			background-color: #cfcfcf!important;
		}
		.navbar{
			font-weight: bold;

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
		.navbar-collapse{
			flex-grow: 0;
		}
		
		.login{

			border-left: 1px solid silver;
			text-transform: none;

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
	<title>Document</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class=" logo nav-link" href="admin.php">
				<span class="text-l">Tune</span>
				<span class="text-r">Source</span>
			</a>
		</div>
		<div style="float: right" class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class=" login navbar-nav">
				<?php 
				if (isset($_SESSION["userName"])) { ?>
					<li class="btn-login nav-item active dropdown">
						<a class="nav-link" href="">Hello ADMIN<span class="glyphicon glyphicon-home sr-only">(current)</span></a>
						<div class="dropdown-content">
							<a class="dropdown-item" href="../logout.php">Logout</a>
						</div>
					</li>
				<?php }else{ ?>
					<li class="btn-login nav-item "><span class="glyphicon glyphicon-home sr-only">(current)</span></a>

					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
</body>
</html>
