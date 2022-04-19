<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
	<style type="text/css">
		.carousel-inner img {
			width: 100%;
			height: 450px;
		}
	</style>
</head>
<body>
	<div style="margin-top: 50px" class="container">
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
				<li data-target="#demo" data-slide-to="3"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="https://avatar-ex-swe.nixcdn.com/slideshow/2021/11/02/6/e/3/b/1635828266850_org.jpg" alt="" width="1100" height="500">
				<!-- <div class="carousel-caption">
					<h3>Los Angeles</h3>
					<p>We had such a great time in LA!</p>
				</div>  -->  
			</div>
			<div class="carousel-item">
				<img src="https://avatar-ex-swe.nixcdn.com/slideshow/2021/11/08/0/9/b/e/1636353706098_org.jpg" alt="" width="1100" height="500">
				<!-- <div class="carousel-caption">
					<h3>Chicago</h3>
					<p>Thank you, Chicago!</p>
				</div> -->   
			</div>
			<div class="carousel-item">
				<img src="https://avatar-ex-swe.nixcdn.com/slideshow/2021/11/10/a/2/4/e/1636511383551_org.jpg" alt="" width="1100" height="500">
				<!-- <div class="carousel-caption">
					<h3>New York</h3>
					<p>We love the Big Apple!</p>
				</div> -->   
			</div>
			<div class="carousel-item">
				<img src="image\slide  image\1603701200162_org.jpg" alt="" width="1100" height="500">
				<!-- <div class="carousel-caption">
					<h3>New York</h3>
					<p>We love the Big Apple!</p>
				</div>   --> 
			</div>
		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
</div>
</body>
</html>