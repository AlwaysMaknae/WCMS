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

// Small form
if(isset($_POST['FormSubmit'])){
	$to = $_POST['email'];
	$subject = "You contacted the admin!";
	$id = $_POST['name'];
	$content = $_POST['comment'];

	$headers = array(
		'From' 			=> 'jose.19315@hotmail.com',
		'Reply-To' 		=> 'jose.19315@hotmail.com',
		'X-Mailer'		=> 'PHP/' . phpversion(),
		'MIME-Version' 	=> '1.0',
		'Content-type' 	=>  'text/html; charset=utf-8'
	);

	$msg = '
	<!DOCTYPE html>
	<html>
	<body>
	<h1>Hi, ' . $id . '</h1>
	<p>You sent the following to the admin: ' . $content . '</p>
	<p>---<br>Jose W.</p>
	</body>
	</html>

	';

	mail($to, $subject, $msg, $headers);

	$to2 = "jose.19315@gmail.com";
	$subject2 = $_POST['name'] . " has contacted you, admin admin!";
	$id2 = "Admin";
	$content2 = $_POST['comment'];

	$headers2 = array(
		'From' 			=> 'jose.19315@hotmail.com',
		'Reply-To' 		=> 'jose.19315@hotmail.com',
		'X-Mailer'		=> 'PHP/' . phpversion(),
		'MIME-Version' 	=> '1.0',
		'Content-type' 	=>  'text/html; charset=utf-8'
	);

	$msg2 = '
	<!DOCTYPE html>
	<html>
	<body>
	<h1>Hi, ' . $id2 . '</h1>
	<p>' . $id . ' said: ' . $content2 . '</p>
	<p>---<br>Jose W.</p>
	</body>
	</html>

	';
	mail($to2, $subject2, $msg2, $headers2);
	header("location: View/mail.php");
}
