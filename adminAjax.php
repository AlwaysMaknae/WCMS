<?php

session_start();
include "adminConnect.php";
include "Model/Utils.class.php";

$Page = null;

if( isset($_GET["Page"]) && $_GET["Page"] != "Select Page" ):
  $Page = $_GET["Page"];
  $Page = $Manager->getPage( $_GET["Page"], true );
  echo $Page;

elseif ( isset($_GET["Save"]) ) :
  if($_POST["content"] == "empty" ){
    //nothig
  } else {
    $Manager->updatePageContent( $_POST["id"], $_POST["title"], $_POST["content"]);
  }

elseif ( isset($_GET["Upload"] ) ):
  $file = Utils::imageHandle( "file" );
  if($file){
    $upload = new UploadBean([
        "title"=> $_POST["title"],
        "alt"=> $_POST["alt"],
        "file"=> $file["file"]
    ]);

    $result = $Manager->addUpload( $upload );
    $boo = $upload->getJSON();
    return true;
  } else {
    return false;
  }

  elseif ( isset( $_GET["Add"] ) ):
    $title = $_GET["Add"];
    $Manager->addPage( $title );
    echo "Page " . $_GET["Add"] . " was added." ;

  elseif ( isset( $_GET["Delete"] ) ):
    $id = $_GET["Delete"];
    $Manager->DeletePage( $id );
    echo "Deleted Page " . $_GET["Delete"] ;






else:
  echo "Nothing";
endif;
