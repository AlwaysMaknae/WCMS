<?php include "header.php" ?>
<!-- navbar -->
<header>
	<a href="admin.php" id="adminLogin"></a>

	<nav>
		<ul>
			<?php foreach($navPages as $p): ?>
				<li class="nav-item">
					<a class="navbar" href="core.php?page=<?= $p->getId(); ?>"  ><?= $p->getTitle(); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>

	<a href="index.php" id="logo"><img src="uploads/<?=$logo['file'] ?>" height="200"></a>
	<p id="more-btn">Plus d'information.</p>
	<script>
		$(function(){
			$("#smallForm").hide();
			$("#more-btn").click(function(){
				$("#smallForm").fadeToggle();
			});
			$("#smallForm").click(function(e){
				$("#smallForm").fadeOut();
			});
		})
	</script>

	<div id="smallForm" style="display:none">
		<i>X</i>
		<?php echo $application['smallcontact']; ?>
	</div>

</header>

<!-- Content  -->
<?php  /*  ?>
<h1><?=$application['title']; ?></h1>
<?php */ ?>

<div class="content" id="<?php echo $thePage->getSubtitle(); ?>">
	<h1><?php echo $thePage->getTitle(); ?></h1>
	<?php echo $thePage->getContent(); ?>

	<?php if ($thePage->getSubtitle() == "Contact" ): ?>
		<br>
		<hr>
		<div id="OwnerContact">
			<h2><?php echo $owner["firstname"] . " " . $owner["lastname"] ?></h2>
			<p><strong>Email : </strong><em><?php echo $owner["email"]; ?></em></p>
			<p><strong>Téléphone : </strong><em><?php echo $owner["phone"]; ?></em></p>
		</div>
	<?php endif; ?>


</div>

	<?php include "footer.php" ?>
