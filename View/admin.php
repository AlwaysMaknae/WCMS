<?php include "header.php" ?>

<? if(!empty($_SESSION['admin'])){ ?>
	<h1>Welcome! This Page Has All The Power!</h1>
	<img src="https://thumbs.gfycat.com/ColorfulWholeClumber-size_restricted.gif" width="900" alt="Joke">
	<form action="../core.php" method="POST">
		<button type="submit" class="btn btn-primary" name="Logout">Logout</button>
	</form>
<? }else{ ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? } ?>

<?php include "footer.php" ?>