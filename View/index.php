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

	<a href="index.php" id="logo"><img src="uploads/<?=$logo['file'] ?>" height="200" alt="logo"></a>
	<p id="more-btn">Plus d'information.</p>
	<script>
		$(function(){
			//$("#smallForm").hide();
			$("#more-btn").click(function(){
				$("#smallForm").fadeToggle();
			});
			$("#smallForm i").click(function(e){
				$("#smallForm").fadeOut();
			});
		})
	</script>

	<div id="smallForm"
	<?php if(isset($_GET["Mail"])): ?>
	style="display:block">
<?php else: ?>
	style="display:none">
<?php endif; ?>

		<i>X</i>
		<?php echo $application['smallcontact']; ?>

		<?php if(isset($_GET["Mail"])): ?>
			<div id="MailOutput">
				<?php if($_GET["Mail"] == "Success"): ?>
					Email Sent
				<?php else: ?>
					Sorry there was an Error
				<?php endif; ?>
			</div>
		<?php endif; ?>

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

<?php if($thePage->getSubtitle() == "Gallery"): ?>
	<div class="gallery-show">
		 <i id="GalleryClose">X</i>
		 <div class="gallery-modal"> </div>
	</div>
<?php endif; ?>

	<?php include "footer.php" ?>
