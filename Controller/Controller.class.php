<?php
class Controller{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){

	}

	function error(){
		require_once "view/404.php";
	}
}

?>