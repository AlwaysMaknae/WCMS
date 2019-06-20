<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h1>Welcome to the Admin pannel!</h1>

	<h2>One day here you'll be able to edit the website's general info.</h2>


	<nav>
		<form action="../core.php" method="GET">
			<button type="submit" class="btn btn-primary" name="Logout">Logout</button>
			<a href="adminCore.php?Pages" class="btn btn-primary"> Edit Pages</a>
			<a href="adminCore.php?Index" class="btn btn-primary"> Index </a>
		</form>
	</nav>



<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
