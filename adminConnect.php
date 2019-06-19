<?php

include_once "class\AdminMaganer.class.php";

  $host 	= "127.0.0.1";
  $user 	= "root";
  $pass 	= "";
  $dbname = "block2_project";

  try{
    $Manager  = new AdminManager($dbname,$host,$user,$pass);
  } catch( PDOException $e){
    print "db connect - ERRROR : " . $e->getMessage() . "<br>";
    die();
  }


 ?>
