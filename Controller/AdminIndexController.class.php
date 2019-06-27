<?php
class AdminIndexController{

    function __construct($Manager, $message = ""){
      $Pages = $Manager->getPagesForDelete();
      $AppTitle = $Manager->getAppTitle();

      include "View/adminIndex.view.php";
    }

}
