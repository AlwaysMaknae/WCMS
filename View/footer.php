<?
$DBManager = new DBManager();
$footer = $DBManager->getFooter();
?>
<div class="container text-center">
	<hr style="color: black;">
	<p>Copyright © 2020 • <?=$footer['username']; ?> | Conçu par </p>
</div>
</div>

</body>
</html>
