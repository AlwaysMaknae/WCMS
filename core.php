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

//NAVIGATION


if(isset($_GET['Login'])){
	$users = new UsersBean($_POST);
	$usersArray = $users->toArray();
	$info = new DBManager();
	$usersinfo = $info->getUsersInfo();
	$userslogin = $info->UsersLoginInfo($_POST['username'], $_POST['password']);

	if($usersArray['username'] == $admin AND $usersArray['password'] == $adminpassword){
		$_SESSION['admin'] = $_POST['username'];
		header("location: adminCore.php");
	}else if($userslogin > 0){
		$_SESSION['admin'] = $_POST['username'];
		header("location: adminCore.php");
	}else{
		header("location:  adminLogin.php?error");
	}
} elseif(isset($_GET['Logout'])){
	session_destroy();
	header("location: index.php");
}elseif( isset($_GET['admin']) ){
	header("location: adminLogin.php");
}elseif(isset($_GET['page'])){
	$Index = new IndexController( $_GET['page'] );
} elseif( isset($_GET['Mail']) ){
	$MailStatus = $_GET['Mail'];
	$Index = new IndexController( 1 );
} else{
	$Index = new IndexController( 1 );
}
