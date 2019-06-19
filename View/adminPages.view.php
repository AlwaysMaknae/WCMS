<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h1>Welcome! Edit the Pages</h1>
  <p>This page will let you edit and Add pages</p>

	<nav>
		<form action="../core.php" method="GET">
			<button type="submit" class="btn btn-primary" name="Logout">Logout</button>
		</form>

		<a href="adminCore.php?Pages" class="btn btn-primary"> Edit Pages</a>
		<a href="adminCore.php?Index" class="btn btn-primary"> Index </a>
	</nav>

  <div class="container form-group">
    <select name="Page">
      <option value="Select Page" disabe selected>Select Page</option>
      <?php foreach ($Pages as $p): ?>
        <option value="<?php echo $p->getId() ?>"><?php echo $p->getTitle() ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <?php
var_dump( $Pages );
  ?>



<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
