<?php
spl_autoload_register(function ($class_name) {
	$filename = "Controller/".$class_name . '.class.php';

	if (file_exists($filename))
		require_once $filename;
	else
		require_once str_replace("Controller", "Model", $filename);
});

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WCMS</title>
	<!-- JQuery Library CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Bootstrap in case we need it -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
	
</style>
</head>
<body>
	<div class="container">