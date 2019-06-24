<?php include "adminHeader.php" ?>

<? if(!empty($_SESSION['admin'])): ?>
  <script src="View/js/uploads.js"></script>
  <script src="View/js/AjaxController.js"></script>
	<h2>Edit the Pages</h2>
  <p>This page will let you edit and Add pages</p>

	<div id="debug" ></div>
  <div class="row">
    <h1>Welcome to Manage Uploads, hey we got there</h1>
  </div>

  <form id="UploadForm" class="form-group" method="post" enctype="multipart/form-data">
    <input class="form-control-sm" type="text" name="title" value="" placeholder="Title">
    <input class="form-control-sm" type="text" name="alt" value="" placeholder="Img Alternate Text">
    <input class="text" type="file" id="file" name="file" accept="image/png, image/jpeg, image/gif">

    <div class="mt-2">
      <button type="submit" class="btn btn-primary" id="UploadSubmit">Upload</button>
      <div class="row m-3" id="output"></div>
    </div>

  </form>

  <div class="row">
    <h2>All Uploads</h2>
  </div>
  <div class="container">
    <div class="row">
      <?php foreach ($Uploads as $img): ?>
        <div class="card mx-2" style="width: 18rem;" >
          <img class="card-img-top" src="<? echo $img->getFile(); ?>" alt="<? echo $img->getAlt(); ?>">
          <div class="card-body">
            <p class="font-bold"><? echo $img->getId(); ?> : <? echo $img->getTitle(); ?> </p>
            <p class="font-italic"><? echo $img->getAlt(); ?> </p>
            <a href="adminCore.php?Uploads" class="btn btn-primary" id="upload-<? echo $img->getId(); ?>2"> Edit </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>



<? else: ?>
	<h1>Error, You Have No Permission!</h1>
	<img src="https://i.redd.it/xuxkzyemvvd11.png" width="1000" alt="error">
<? endif; ?>

<?php include "footer.php" ?>
