<?php
session_start();

include "adminConnect.php";
include "Controller/AdminPagesController.class.php";
include "Controller/AdminIndexController.class.php";
include "Controller/AdminUploadsController.class.php";

	//DBN();

if(isset($_GET['Logout'])) :

	session_destroy();
	header("location: core.php");

elseif( isset($_GET["Pages"]) ) :
	new AdminPagesController($Manager);
	//header( "Location: view/adminPages.view.php");

elseif( isset($_GET["Uploads"]) ) :
	new AdminUploadsController($Manager);
	//header( "Location: view/adminPages.view.php");
elseif( isset($_GET["Delete"]) ) :
	new AdminIndexController($Manager);
	//header( "Location: view/adminPages.view.php");
elseif( isset($_GET["AppTitle"]) ) :

	$message = "Updated Title to : " . $_GET["AppTitle"];
	( !empty($_GET["AppTitle"]) ) ?
		$Manager->UpdateTitle( $_GET["AppTitle"] ) :
		$message = "Title Can't be empty";

	new AdminIndexController($Manager, $message);
	//header( "Location: view/adminPages.view.php");

else :
	new AdminIndexController($Manager);
	//header( "Location: view/adminIndex.view.php");

endif;



function DBN(){
	var_dump( $_GET );
	die();
}
