<?php

class AdminUploadsController{
    function __construct($Manager){
      $Uploads = $Manager->getUploads();
      include "View/adminUploads.view.php";
    }

}
