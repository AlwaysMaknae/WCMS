<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h2>Edit the Pages</h2>
  <p>This page will let you edit and Add pages</p>


	<div class="appSubmits my-4">
		<button type="button" class="btn btn-primary submit" name="Save"> Save </button>
		<button type="button" class="btn btn-primary submit" name="Preview"> Preview </button>
		<button type="button" class="btn btn-primary submit" name="Reset"> Reset </button>
	</div>

  <div class="mt-2 form-group">
    <select name="Page" class="form-control form-control-lg" id="PagesSelect">
      <option value="Select Page" disabe selected>Select Page To Edit</option>



      <?php foreach ($Pages as $p): ?>
        <option value="<?php echo $p->getId() ?>"><?php echo $p->getTitle() ?></option>
      <?php endforeach; ?>

    </select>
  </div>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="View/js/ents.js"></script>
	<script src="View/js/app.js"></script>
	<script src="View/js/AjaxController.js"></script>


	<div class="appButtons my-4">
		<button type="button" class="btn btn-light add" name="h2"> Add Main Title</button>
		<button type="button" class="btn btn-light add" name="h3"> Add Small Title </button>
		<button type="button" class="btn btn-light add" name="p"> Add Paragraph</button>
		<button type="button" class="btn btn-light add" name="a"> Add link </button>
		<button type="button" class="btn btn-light add" name="hr"> Add Horizontal Rule </button>
	</div>



	<div class="row container">
		<input type="text" name="pageTitle" value=""
		placeholder="Current Page Title" class="form-control form-control-md">
		<hr/>
	</div>
	<div id="app"></div>
	<div id="input"



	></div>



<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
