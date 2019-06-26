<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
	<h2>Home</h2>
	<p>One day here you'll be able to edit the website's general info.</p>

	<script src="View/js/pages.js"></script>
	<script src="View/js/AjaxController.js"></script>

	<div class="row mb-2">
		<button type="button" name="Add Page" class="btn btn-danger" data-toggle="modal" data-target="#addPageModal" >Add a Page</button>
	</div>

<!-- Modal -->
<div class="modal fade" id="addPageModal" tabindex="-1" role="dialog" aria-labelledby="addPageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageModalLabel">Add Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form-group">
				<p>Once the page is added, go to Edit Page to add content to it.</p>
				<input class="form-control-lg add" type="text" name="newPageTitle" value="" placeholder="New Page Title" id="PageTitle">

				<p class="font-italic" id="PageSaveOutput"></p>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="AddPageButton">Add page</button>
      </div>
    </div>
  </div>
</div>




		<ul class="list-group">
			<?php foreach ($Pages as $p): ?>

				<li class="list-group-item">

					<? echo $p->getTitle(); ?> (<? echo $p->getSubtitle(); ?>)
					<button type="button" name="delete" class="btn btn-danger float-right">Delete</button>
				</li>

			<?php endforeach; ?>
		</ul>







<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "adminFooter.php" ?>
