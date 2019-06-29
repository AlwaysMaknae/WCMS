<?php

class AdminUploadsController{
    function __construct($Manager){
      $Uploads = $Manager->getUploads();
      $AppTitle = $Manager->getAppTitle();
      include "View/adminUploads.view.php";
    }

}
