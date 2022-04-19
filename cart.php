<?php
	session_start();
	include('connect.php');

	$musicID =  $_GET['id'];
	if (isset($_SESSION['userID']) && $_SESSION['userID'] != null){
		$userID = $_SESSION['userID'];
		$sql="select * from cart where userID='$userID' and musicID='$musicID'";
		$result = mysqli_query($connect, $sql);
		$check_music = mysqli_num_rows($result);
		if ($check_music > 0) {
			echo "<script>alert('Music already in the cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		else {
			$sql = " insert into cart values ('', '$userID', '$musicID') ";
			$result = mysqli_query($connect, $sql);	
			if ($result) {
				echo "<script>alert('Music added to the cart successfully!')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
			else {
				echo "<script>alert('Error')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
		}
	}
	else {
		echo "<script>alert('You need to be logged in to perform this action')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}
	?>