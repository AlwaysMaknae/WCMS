<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><? echo $AppTitle ?> Admin Panel</title>
	<!-- JQuery Library CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Bootstrap in case we need it -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>

	#app button{
		vertical-align: top;
	}
	#app input{
		width: 100%;
	}
	#app img, #input img{
		width: 200px;
	}
	#app textarea{
		width: 100%;
		resize: vertical;
		min-height: 100px;
	}

	#app div{
		margin-bottom: 20px;
	}


</style>
</head>
<body>
	<div class="container">
			<h1>Welcome to the Admin pannel!</h1>
		<nav class="mb-2">
				<a href="core.php?Logout" class="btn btn-danger">Logout</a>
				<a href="adminCore.php?Index" class="btn btn-primary"> Index </a>
				<a href="adminCore.php?Pages" class="btn btn-primary"> Edit Pages</a>
				<a href="adminCore.php?Uploads" class="btn btn-primary"> Manage Uploads </a>
		</nav>
