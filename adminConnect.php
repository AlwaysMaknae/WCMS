<?php

include_once "Controller\AdminMaganer.class.php";

  $host 	= "127.0.0.1";
  $user 	= "root";
  $pass 	= "root";
  $dbname = "block2_project";
  $Manager = null;

  try{
    $Manager  = new AdminManager($dbname,$host,$user,$pass);
  } catch( PDOException $e){
    print "db connect - ERRROR : " . $e->getMessage() . "<br>";
    die();
  }


 ?>
