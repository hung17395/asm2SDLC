<?php
session_start();

include('connect.php');

if(isset($_POST['login'])){
 // Lấy dữ liệu được nhập từ form , kiểm tra so với dữ liệu ở database
	$username = $_POST['userName'];
	$password = $_POST['userPassword'];
 // chọn trong bảng users, dòng nào có username = $username và password = $password
	$sql="SELECT * FROM user WHERE userName ='$username' AND userPassword ='$password' ";
// Dùng hàm mysqli_query để thực thi truy vấn từ cơ sở dữ liệu và trả về kết quả
	$result = mysqli_query($connect, $sql);
 // Trả kết quả các hàng trong bảng được truy vấn --> dùng hàm //mysqli_num_row($result)
	$data = mysqli_fetch_array($result);
	$check_login = mysqli_num_rows($result);
 // Nếu tìm thấy kết quả, tức là tìm thấy trong các hàng có username = $username và password = $password ---> check_login > 0
	if (is_array($data)) {

		$_SESSION["userName"] = $data ['userName'];
		$_SESSION["userPassword"] = $data ['userPassword'];
		$_SESSION["fullname"] = $data ['fullname'];
	}
	else{
		echo"<script>alert('Incorrect account or password!')</script>";
	}
}


if (isset($_SESSION["userName"])) {
	if ($_SESSION["userName"]=="admin") {
		header('location:admin/admin.php');
	}
	else{
	header("location:index.php");
	$_SESSION["userID"] = $data ['userID'];
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>Login</title>
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
		
		.login-right{
			background-color: white;
			position: relative;
			z-index: 1;
			height: 700px;
			border-top-left-radius: 350px;
			border-bottom-left-radius: 350px;
		}
		.gird-input{
			width: 500px;
			height: 400px;
			transform: translateX(50%);
			margin-left: -300px;
			z-index: 2;
			background: #cfcfcf;
			margin: 150px auto auto 100px;
			border-radius: 20px;
		}
		.gird-input .login h3{
			font-weight: bold;
			text-transform: uppercase;
			padding:30px 0px;
			text-align: center;
		}
		.form-login{
			position: absolute;
			left: 50%;
			margin-left: -150px
		}
		.form-group{
			font-weight: normal;
			background-color: #fff;
			border-radius: 5px;	
			width: 300px;
			height: auto;
			padding: 10px 20px;
			border-radius: 25px
			
		}
		.form-group .user-info{
			padding-left: 10px
		}
		.form-group .user-info{
			border: none;
			background: none;
			outline: none;
		}
		.btn-login{
			width: 100%;
		}
		.form-login a{
			display: block;
			float: right;
			text-decoration: none;
			color: gray;
		}
		.form-login a:hover{
			color: black;
		}
		.form-login .btn-login{			
			margin-top: 60px;
		}
		.form-login .btn-login a{
			float: left;
			padding: 10px 20px;
			margin-left: 20px;
			color: #fff;
			transition: 1s;
		}
		.form-login .btn-login a:hover{
			color: gray;
			transition: 0.5s;
			margin: 0
		}
		.form-login .btn-login button{
			float: right;		
			height: auto;
			background-color: white;
			border-radius: 25px;
			padding: 10px 20px;
			font-weight: bold;
			text-transform: uppercase;
			border: none;
			outline: none;
		}
		.form-login .btn-login button:hover{
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	<h1>duong da chinh sua</h1>
	<?php include('element/navbar.php') ?>
	<div class="gird-login container-fluid">
		<div class="row">
			<div class="col-5 background-left">
				<img class="image-left" src="image/logo/TuneSource.png" alt="g">
			</div>
			<div class="col-7 login-right">
				<div class="gird-input">
					<div class="login">
						<h3>login</h3>

						<form class="form-login" method="POST" action="">
							<div class="form-group">
								<i class="fas fa-user"></i>
								<input class="user-info" type="text" placeholder="Username" name="userName">
							</div>
							<div class="form-group">
								<i class="fas fa-key"></i>
								<input class="user-info" type="password" placeholder="Password" name="userPassword">
							</div>				
							<a href="register.php">Register an account</a>							
							<div class="btn-login">
								<button class="submit-login" name="login">login</button>
								<a href="index.php"><i class="fas fa-arrow-alt-left"></i>Back</a>			
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('element/footer.php') ?>
</body>
</html>