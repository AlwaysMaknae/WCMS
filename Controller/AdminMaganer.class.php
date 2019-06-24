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


  public function getPage($id, $async=false){
    $pageQ = $this->prepare("SELECT * FROM `pages` WHERE id = :id LIMIT 1");
    $pageQ->execute( ["id" => $id] );
    $page = $pageQ->fetch( PDO::FETCH_ASSOC );

    if( $page && $async){
      $page = json_encode( $page , JSON_UNESCAPED_UNICODE);
    } else {
      $page = new PageBean( $page );
    }
    return $page;
  }

  public function updatePageContent($id, $title, $content){
    $pageU = $this->prepare("UPDATE `pages` SET `title`=:title,`content`=:content WHERE `id`=:id");
    $pageU->execute( ["id" => $id,
    "title"=>$title,
    "content"=>$content] );
  }

}




 ?>
