<?
$DBManager = new DBManager();
$owner = $DBManager->getOwner();
$webmaster = $DBManager->getWebmaster();
?>
	<footer>
		<p>Copyright © 2020 • <?=$owner['firstname']; ?> | Conçu par <?=$webmaster['firstname']; ?></p>
	</footer>
</body>
</html>
