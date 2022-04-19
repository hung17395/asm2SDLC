<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>LRegister</title>
	<style type="text/css">
		.gird-login{
			margin-top: 60px;
			width: 100%;
			background: linear-gradient(to top ,gray,silver,white);	
			
		}
		.background-left{
			border-top-left-radius: 350px;
			border-bottom-left-radius: 350px;
		}
		.background-left img{
			transform: translateY(50%);
			width: 100%;
			height: auto;
			
		}
		
		.register-right{
			background-color: white;
			position: relative;
			z-index: 1;
			height: 700px;
			border-top-left-radius: 350px;
			border-bottom-left-radius: 350px;
		}
		.gird-input{
			width: 500px;
			height: 450px;
			transform: translateX(50%);
			margin-left: -300px;
			z-index: 2;
			background: #cfcfcf;
			margin: 150px auto auto 100px;
			border-radius: 20px;
		}
		.gird-input .register h3{
			font-weight: bold;
			text-transform: uppercase;
			padding:30px 0px;
			text-align: center;
		}
		.form-register{
			position: absolute;
			left: 50%;
			margin-left: -150px
		}
		.form-register .form-group{
			font-weight: normal;
			background-color: #fff;
			border-radius: 5px;	
			width: 300px;
			height: auto;
			padding: 10px 20px;
			border-radius: 25px
		}

		.form-group .user-info{
			padding-left: 10px;


		}

		.form-group .user-info{
			border: none;
			background: none;
			outline: none;
		}
		.btn-register{
			width: 100%;
		}
		.form-register a{
			display: block;
			float: right;
			text-decoration: none;
			color: gray;
		}
		.form-register a:hover{
			color: black;
		}
		.form-register .btn-register{
			
			margin-top: 40px;
		}
		.form-register .btn-register a{
			float: left;
			padding: 10px 20px;
			margin-left: 20px;
			color: #fff;
			transition: 1s;
		}
		.form-register .btn-register a:hover{
			color: gray;
			transition: 0.5s;
			margin: 0
		}
		.form-register .btn-register button{
			float: right;
			
			height: auto;
			background-color: white;
			border-radius: 25px;
			padding: 10px 20px;
			font-weight: bold;
			text-transform: uppercase;
			border: none;
			outline: none;
			transition: 0.4s;

		}
		.form-register .btn-register button:hover{
			
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	
	<?php include('element/navbar.php') ?>
	<div class="gird-login container-fluid">
		<div class="row">
			<div class="col-5 background-left">
				<img class="image-left" src="image/logo/TuneSource.png" alt="g">
			</div>
			<div class="col-7 register-right">
				<div class="gird-input">
					<div class="register">
						<h3>register acount</h3>
						<form class="form-register" method="POST" action="">							
							<div class="form-group">
								<i class="fas fa-user"></i>
								<input class="user-info" type="text" placeholder="Username" name="username">
							</div>
							<div class="form-group">
								<i class="fas fa-signature"></i>
								<input class="user-info" type="text" placeholder="Fullname" name="fullname">
							</div>
							<div class="form-group">
								<i class="fas fa-envelope"></i>
								<input class="user-info" type="text" placeholder="Email"  name="email">
							</div>
							<div class="form-group">
								<i class="fas fa-key"></i>
								<input class="user-info" type="password" placeholder="Password" name="password">
							</div>														
							<div class="btn-register">
								<button class="submit-register" name="register">Register</button>
								<a href="login.php"><i class="fas fa-arrow-alt-left"></i>Back</a>
							</div>
						</form>
						<?php 
						include('connect.php');
						if (isset($_POST['register'])) { 
							$username = $_POST['username'];
							$fullname=$_POST['fullname'];
							$email = $_POST['email'];
							$password = $_POST['password'];

							$sql="INSERT INTO user VALUES (NULL,'$username','$fullname','$email','$password','guest')";
							$result = mysqli_query($connect,$sql);
							if ($result) {
								echo "<script>alert('Account has been created successfully!')</script>";
								echo "<script>window.open('login.php','_self')</script>";
							}
							else{
								echo"<script>alert('Error')</script>";
							}  
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('element/footer.php') ?>
</body>
</html>