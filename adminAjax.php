<?php

session_start();
include "adminConnect.php";

$Page = null;


if( isset($_GET["Page"]) && $_GET["Page"] != "Select Page" ):
  $Page = $_GET["Page"];

  $Page = $Manager->getPage( $_GET["Page"], true );

  echo $Page;
  elseif ( isset($_GET["Save"]) ) :
    if($_POST["content"] == "empty" ){
      
    } else {
      $Manager->updatePageContent( $_POST["id"], $_POST["title"], $_POST["content"]);
    }





else:
  echo "false";
endif;
