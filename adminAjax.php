<?php

session_start();
include "adminConnect.php";

$Page = null;


if( isset($_GET["Page"]) && $_GET["Page"] != "Select Page" ):
  $Page = $_GET["Page"];

  $Page = $Manager->getPage( $_GET["Page"], true );

  echo $Page;
else:
  echo "false";
endif;
