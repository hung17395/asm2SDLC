<?php 
include 'connect.php';
session_start();

// unset($_SESSION['userName']);
// header('locaton:index.php');
session_destroy();
header('location:index.php');
?> 