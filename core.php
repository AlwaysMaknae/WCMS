<?php
session_start();
$admin = "admin";
$adminpassword = "admin";

if(isset($_POST['Login'])){
	if($_POST['username'] == $admin AND $_POST['password'] == $adminpassword){
		$_SESSION['admin'] = $_POST['username'];
		header("Location: adminCore.php");
	}else{
		header("Location: index.php?error=logininfo");
	}
}

if(isset($_GET['Logout'])){
	session_destroy();
	header("location: index.php");
}
