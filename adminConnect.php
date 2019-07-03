<?php

include_once "Controller/AdminMaganer.class.php";

  $host 	= "localhost";
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
