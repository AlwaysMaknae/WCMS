<?php include "header.php"; ?>

<?php 
$content = [];
foreach ($pagesinfo as $value) {
	$content[] = $value->getContent();
}
?>




<?php include "footer.php" ?>