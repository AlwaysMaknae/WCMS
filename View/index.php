<?php include "header.php" ?>
<!-- navbar navbar-expand-sm bg-dark -->
	<h1>Welcome</h1>
	<div class="content">
		<ul class="navbar-nav">
			<?php foreach($navPages as $p): ?>
				<li class="nav-item">
					<a class="nav-link" href="core.php?page=<?= $p->getId(); ?>"  ><?= $p->getTitle(); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="container">
		<h2> <?php echo $thePage->getTitle(); ?></h2>

		<?php
			echo $thePage->getContent();
		?>

	</div>

<?php include "footer.php" ?>
