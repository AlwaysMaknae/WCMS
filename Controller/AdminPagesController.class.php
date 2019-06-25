<?php

class AdminPagesController{
    function __construct($Manager){
      $Pages = $Manager->getPages();
      $Uploads = $Manager->getUploads();
      include "View/adminPages.view.php";
    }

}
