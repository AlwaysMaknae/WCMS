<?php


/**
 *
 */
class AdminManager extends PDO
{

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
}



 ?>
