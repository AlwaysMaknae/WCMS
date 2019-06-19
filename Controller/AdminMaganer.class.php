<?php

require_once "Model/PageBean.class.php";
/**
 *
 */
class AdminManager extends PDO {

  function __construct( $db, $h, $u, $pw ){

    $this->host =  $h;
    $this->user =  $u;
    $this->pass =  $pw;
    $this->dbname =  $db;

    try{
      parent::__construct("mysql:host=$this->host;dbname=$this->dbname", $u, $pw);
    } catch( PDOException $e){
      print "db connect - ERRROR : " . $e->getMessage() . "<br>";
      die();
    }
}

public function getPages(){
    $pageQ = $this->query("SELECT `id`, `title` FROM `pages`");
    $pages = $pageQ->fetchAll( PDO::FETCH_ASSOC );
    $pp = [];

    foreach( $pages as $p){
      $pp[] = new PageBean($p);
    }


    return $pp;

  }

}

 ?>
