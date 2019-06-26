<?php
class AdminIndexController{

    function __construct($Manager){
      $Pages = $Manager->getPages();
      include "View/adminIndex.view.php";
    }

}
