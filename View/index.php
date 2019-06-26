<?php include "header.php" ?>
<?php
$DBManager = new DBManager();
$application = $DBManager->getApplication();
$logo = $DBManager->getLogo();
?>
<!-- navbar -->
<div class="nav">
	<a href="index.php"><img src="uploads/<?=$logo['file'] ?>" height="200"></a>
	<ul class="">
		<?php foreach($navPages as $p): ?>
			<li class="nav-item">
				<a class="navbar" href="core.php?page=<?= $p->getId(); ?>"  ><?= $p->getTitle(); ?></a>
			</li>
		<?php endforeach; ?>
		<?php
		echo $application['smallcontact'];
		?>
	</ul>
</div>

<?=$application['title']; ?>
<h2><?php echo $thePage->getTitle(); ?></h2>
<div class="content">
	<?php
	echo $thePage->getContent();
	?>

	<?php include "footer.php" ?>