<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h2>Edit the Pages</h2>
  <p>This page will let you edit and Add pages</p>


	<div id="debug" ></div>

	<div class="appSubmits my-4">
		<button type="button" class="btn btn-primary submit" name="Save"> Save </button>
		<!-- <button type="button" class="btn btn-primary submit" name="Preview"> Preview </button> -->
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




	<div class="row container mb-3">
		<label> Page Title :</label>
		<input type="text" name="pageTitle" id="pageTitle" value=""
		placeholder="Current Page Title" class="form-control form-control-md"
		disabled="true">
	</div>

	<nav class="mb-3">
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
			aria-selected="true">Edit</a>
	    <button class="submit nav-item nav-link btn btn-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
			aria-controls="nav-profile" aria-selected="false" name="Preview" >Preview</button>

		</a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  <div class="tab-pane fade show active" id="nav-home"
		role="tabpanel" aria-labelledby="nav-home-tab">

			<div id="app" ></div>

		</div>
	  <div class="tab-pane fade" id="nav-profile"
		role="tabpanel" aria-labelledby="nav-profile-tab">

			<div class="">
				<!-- <p class="font-italic font-weight-light" >If not up to date, click the Preview button.</p> -->
			</div>
			<div id="input" ></div>

		</div>
	</div>


		</div>








<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
