<?php

class IndexController{
  private $db;
  public function __construct($pageId = 0){

    $this->db = new DBManager();
    $navPages = $this->db->getAllPages();
    //Fetch Page with ID
    include "../View/index.php";

  }
}
