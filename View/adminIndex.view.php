<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h2>Home</h2>
	<p>One day here you'll be able to edit the website's general info.</p>



<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
