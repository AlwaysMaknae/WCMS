<?php include "header.php" ?>
<?php
$DBManager = new DBManager();
$application = $DBManager->getApplication();
$logo = $DBManager->getLogo();
?>
<!-- navbar -->
<nav>
	<a href="admin" id="adminLogin"></a>

	<a href="index.php"><img src="uploads/<?=$logo['file'] ?>" height="200"></a>
	<ul class="">
		<?php foreach($navPages as $p): ?>
			<li class="nav-item">
				<a class="navbar" href="core.php?page=<?= $p->getId(); ?>"  ><?= $p->getTitle(); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
		<?php echo $application['smallcontact']; ?>
</nav>

<!-- Content  -->
<h1><?=$application['title']; ?></h1>
<h2><?php echo $thePage->getTitle(); ?></h2>
<div class="content" id="<?php echo $thePage->getSubtitle(); ?>">
	<?php echo $thePage->getContent(); ?>
</div>

	<?php include "footer.php" ?>
