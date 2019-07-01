<?php

class IndexController{
  private $db;
  public function __construct($pageId = 1){

    $this->db = new DBManager();
    $navPages = $this->db->getAllPages();
    $thePage = $this->db->getOnePage($pageId);

    $application = $this->db->getApplication();
    $logo = $this->db->getLogo();

    $owner = $this->db->getOwner();
    $webmaster = $this->db->getWebmaster();



    include "View/index.php";
  }
}
