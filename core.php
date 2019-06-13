<?php
session_start();
$admin = "admin";
$adminpassword = "admin";

if(isset($_POST['Login'])){
	if($_POST['username'] == $admin AND $_POST['password'] == $adminpassword){
		$_SESSION['admin'] = $_POST['username'];
		header("location: view/admin.php");
	}else{
		header("location: index.php?error=logininfo");
	}
}

if(isset($_POST['Logout'])){
	session_destroy();
	header("location: index.php");
}