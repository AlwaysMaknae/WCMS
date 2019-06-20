<?php
session_start();
spl_autoload_register(function ($class_name) {
	$filename = "Controller/".$class_name . '.class.php';

	if (file_exists($filename))
		require_once $filename;
	else
		require_once str_replace("Controller", "Model", $filename);
});
//Login and Admin Login
$admin = "admin";
$adminpassword = "admin";

if(isset($_GET['Login'])){
	$users = new UsersBean($_POST);
	$usersArray = $users->toArray();
	$info = new DBManager();
	$usersinfo = $info->getUsersInfo();
	$userslogin = $info->UsersLoginInfo($_POST['username'], $_POST['password']);

	var_dump($userslogin);
	if($usersArray['username'] == $admin AND $usersArray['password'] == $adminpassword){
		$_SESSION['admin'] = $_POST['username'];
		header("location: View/admin.php");
	}else if($userslogin > 0){
		header("location: View/admin.php");
	}else{
		header("location:  View/adminLogin.php?error");
	}
}

if(isset($_POST['Logout'])){
	session_destroy();
	header("location: index.php");
}

if( isset($_GET['admin']) ){
	header("location: View/adminLogin.php");
}

// Display pages
if(isset($_GET['page'])){
	$Index = new IndexController( $_GET['page'] );
}
