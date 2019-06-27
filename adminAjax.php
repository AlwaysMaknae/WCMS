<?php

session_start();
include "adminConnect.php";
include "Model/Utils.class.php";

$Page = null;

if( empty($_SESSION['admin']) ):
  echo "Denied";

elseif( isset($_GET["Page"]) && $_GET["Page"] != "Select Page" ):
  $Page = $_GET["Page"];
  $Page = $Manager->getPage( $_GET["Page"], true );
  echo $Page;

elseif ( isset($_GET["Save"]) ) :
  if($_POST["content"] == "empty" ){
    echo "Don't leave page Empty";
  } else {
    $Manager->updatePageContent( $_POST["id"], $_POST["title"], $_POST["content"]);
    echo $_POST["title"] ." page Saved.";
  }

elseif ( isset($_GET["Upload"] ) ):
  $file = Utils::imageHandle( "file" );
  if($file["succes"]){
    $upload = new UploadBean([
        "title"=> $_POST["title"],
        "alt"=> $_POST["alt"],
        "file"=> $file["file"]
    ]);

    $result = $Manager->addUpload( $upload );
    $UploadOutput = $upload->getJSON();
    echo $UploadOutput;
  } else {
    $err = ["error" => true, "message" => $file["error"] ];
    echo json_encode($err);
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
  echo "Denied";
endif;
