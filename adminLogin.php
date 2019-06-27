<?php include "View/header.php" ?>

<a href="core.php">
	<button type="button" name="back"> Back to Website </button>
</a>
	<h1>Login page</h1>
		<form action="core.php?Login" method="POST">
			<div class="form-group">
				<label for="email">Username:</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary" name="Login">Login</button>
		</form>
		<?php if( isset($_GET["error"])): ?>
		 <div class="error">
		 	<p>invalid credentials</p>
		 </div>
	 <?php endif; ?>

<?php include "View/adminFooter.php" ?>
