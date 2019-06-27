<?php

require_once "Model/PageBean.class.php";
require_once "Model/UploadBean.class.php";
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
    $pageQ = $this->query("SELECT `id`, `title`, `subtitle` FROM `pages`");
    $pages = $pageQ->fetchAll( PDO::FETCH_ASSOC );
    $pp = [];

    foreach( $pages as $p){
      $pp[] = new PageBean($p);
    }
    return $pp;
  }

  public function getPagesForDelete(){
      $pageQ = $this->query("SELECT `id`, `title`, `subtitle` FROM `pages` WHERE subtitle='Page'");
      $pages = $pageQ->fetchAll( PDO::FETCH_ASSOC );
      $pp = [];

      foreach( $pages as $p){
        $pp[] = new PageBean($p);
      }
      return $pp;
    }

  public function getAppTitle(){
    $titleQ = $this->query("SELECT `title` FROM `application`");
    $title = $titleQ->fetch( PDO::FETCH_COLUMN );
    $ee = $titleQ->errorInfo();

    return $title;
  }

  public function UpdateTitle($title){
    $pageU = $this->prepare("UPDATE `application` SET `title`=:title");
    $pageU->execute( ["title"=>$title] );
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

  public function deletePAge($id){
    $pageD = $this->prepare("DELETE FROM `pages` WHERE `id`=:id");
    $pageD->execute( ["id" => $id] );
  }



  public function getUploads(){
    $pageQ = $this->query("SELECT * FROM `uploads`");
    $pages = $pageQ->fetchAll( PDO::FETCH_ASSOC );
    $pp = [];

    foreach( $pages as $p){
      $pp[] = new UploadBean($p);
    }
    return $pp;
  }

  public function addUpload(UploadBean $up){
    $uploadI = $this->prepare("INSERT INTO `uploads`(`id`, `file`, `title`, `alt`) VALUES (DEFAULT,:file,:title,:alt)" );
    $result = $uploadI->execute([
      "file" => $up->getFile(false),
      "title"=>$up->getTitle(),
      "alt"=>$up->getAlt()
    ]);
    return $result;
  }

  public function addPage($title){
    $addPq = $this->prepare("INSERT INTO `pages`(`id`, `title`, `subtitle`, `content`) VALUES (DEFAULT,:title,:subtitle,:content)" );
    $result = $addPq->execute([
      "title"=>$title,
      "subtitle"=>"Page",
      "content"=>"<h3>New Page</h3>",
    ]);
    return $result;
  }

}




 ?>
