<?php include "header.php" ?>
<?php
	$DBManager = new DBManager();
	$application = $DBManager->getApplication();
?>
<!-- navbar -->
<h1>	<?=$application['title'] ?> </h1>
<?=$application['logo_fk'] ?>
<div class="content">
	<ul class="navbar-nav navbar-expand bg-dark">
		<?php foreach($navPages as $p): ?>
			<li class="nav-item">
				<a class="nav-link m-3" href="core.php?page=<?= $p->getId(); ?>"  ><?= $p->getTitle(); ?></a>
			</li>
		<?php endforeach; ?>
		<?php
		echo $application['smallcontact'];
		?>
	</ul>
</div>
<div class="container">
	<h2> <?php echo $thePage->getTitle(); ?></h2>

	<?php
		echo $thePage->getContent();
	?>

</div>


<?php include "footer.php" ?>
