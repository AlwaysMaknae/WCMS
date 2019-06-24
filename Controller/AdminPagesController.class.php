<?php

class AdminPagesController{
    function __construct($Manager){
      $Pages = $Manager->getPages();
      include "View/adminPages.view.php";
    }

}
