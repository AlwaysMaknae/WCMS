<?
$DBManager = new DBManager();
$owner = $DBManager->getOwner();
$webmaster = $DBManager->getWebmaster();
?>
	<hr>
	<p class="footer">Copyright © 2020 • <?=$owner['firstname']; ?> | Conçu par <?=$webmaster['firstname']; ?></p>
</div>

</body>
</html>
