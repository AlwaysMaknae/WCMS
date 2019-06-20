<?php include "header.php" ?>

	<h1>Login page</h1>
		<form action="core.php" method="POST">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary" name="Login">Login</button>
		</form>
		
<?php include "footer.php" ?>
