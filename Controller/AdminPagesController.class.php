<?php

class AdminPagesController{
    function __construct($Manager){
      $Pages = $Manager->getPages();
      $Uploads = $Manager->getUploads();
      $AppTitle = $Manager->getAppTitle();
      include "View/adminPages.view.php";
    }

}
