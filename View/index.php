
<?php
$DBManager = new DBManager();
$application = $DBManager->getApplication();
$logo = $DBManager->getLogo();
$gallery = $DBManager->getUploads();
var_dump($gallery);
?>
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

		// Open the Modal
		function openModal() {
			document.getElementById("gallery").style.display = "block";
		}
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
<?php if($thePage->getSubtitle() == "gallery"){ ?>
	<div class="row" id="gallery">
		<?php foreach($gallery as $key => $gall){ ?>
			<div class="column">
				<img src="uploads/<?= $gall['file']; ?>" onclick="openModal();currentSlide(<?= $key ?>)" class="hover-shadow displayer">
			</div>
		<?php } ?>

		<<!-- The Modal/Lightbox -->
		<div id="myModal" class="modal">
			<span class="close cursor" onclick="closeModal()">&times;</span>
			<div class="modal-content">
				<?php foreach($gallery as $key => $gall){ ?>
					<div class="mySlides">
						<img src="uploads/<?= $gall['file'] ?>" style="width:100%; height: 90%;">
					</div>
				<?php } ?>

				<!-- Next/previous controls -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

				<!-- Thumbnail image controls -->
				<?php foreach($gallery as $key => $gall){ ?>
					<div class="column">
						<img class="demo" src="uploads/<?= $gall['file'] ?>" onclick="currentSlide(<?= $key ?>)" alt="Nature">
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="content" id="gallery">
		<h1><?php echo $thePage->getTitle(); ?></h1>
		<?php echo $thePage->getContent(); ?>
	</div>
<?php } ?>


<script>
	// Open the Modal
	function openModal() {
		document.getElementById("myModal").style.display = "block";
	}

// Close the Modal
function closeModal() {
	document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
	showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("demo");
	var captionText = document.getElementById("caption");
	if (n > slides.length) {slideIndex = 1}
		if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " active";
		}
	</script>
	<?php include "footer.php" ?>
