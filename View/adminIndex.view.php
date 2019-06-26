<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
<script src="View/js/index.js"></script>
<script src="View/js/pages.js"></script>
<script src="View/js/AjaxController.js"></script>

	<?php if (!empty($message)): ?>
		<div class="alert alert-success alert-dismissible fade show row" role="alert">
			<strong><?php echo $message; ?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	<div class="alert alert-success alert-dismissible fade show row" role="alert" style="display: none" >
		<strong id="deleteAlert"></strong>
		<button type="button" class="close" id="alertClose" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<form action="adminCore.php" method="get">
		<div class="mb-4">
			<h3 class="d-block">Edit Website Title</h3>
			<div class="row container">
				<input id="EditTitle" type="text" name="AppTitle" value="<?php echo $AppTitle; ?>" class="form-control-lg" placeholder="<?php echo $AppTitle; ?>">
				<button type="submit" class="btn btn-primary btn-lg"> Edit </button>
			</div>
		</div>
	</form>


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

				<input class="form-control-lg add" type="text" name="newPageTitle" placeholder="New Page Title" id="PageTitle">

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
					<? echo $p->getId() . " : " . $p->getTitle(); ?>
					<button type="button" name="delete-<? echo $p->getId(); ?>" class="btn btn-danger float-right delete">Delete</button>
				</li>
			<?php endforeach; ?>
		</ul>






<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
