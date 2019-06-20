<?php

class IndexController{
  private $db;
  public function __construct($pageId = 0){

    $this->db = new DBManager();
    $navPages = $this->db->getAllPages();
    $thePage = $this->db->getOnePage($pageId);
    include "View/index.php";

  }
}
