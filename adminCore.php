<?php
session_start();

include_once "adminConnect.php";



if(isset($_GET['Logout'])) :

	session_destroy();
	header("location: core.php");

elseif( isset($_GET["Page"]) ) :

else :
	header( "Location: view/adminIndex.view.php");

endif;
