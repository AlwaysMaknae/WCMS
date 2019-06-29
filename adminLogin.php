<?php include "View/header.php" ?>

<div class="login">
	<a href="core.php">
		<button type="button" name="back"> Back to Website </button>
	</a>
		<h1>Login page</h1>
			<form action="core.php?Login" method="POST">
				<div class="form-group">

					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">

					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary" name="Login">Login</button>
			</form>
			<?php if( isset($_GET["error"])): ?>
			 <div class="error">
			 	<p>invalid credentials</p>
			 </div>
		 <?php endif; ?>
		 <?php include "View/adminFooter.php" ?>
</div>
