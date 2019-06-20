<?php
spl_autoload_register(function ($class_name) {
		$filename = "Controller/".$class_name . '.class.php';

		if (file_exists($filename))
	    	require_once $filename;
	    else
	    	require_once str_replace("Controller", "Model", $filename);
	});
class DBManager{
	private $db;

	public function __construct(){
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "block2_project";

		try{
			$this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch(Exception $e){
			die("Database Connection Error: " . $e->getMessage());
		}
	}

	public function getUsersInfo(){
		$query = $this->db->query("SELECT * FROM users");
		$usersArray = $query->fetchAll(PDO::FETCH_ASSOC);
		$usersObj = [];

		foreach($usersArray as $array){
			$usersObj[] = new UsersBean($array);
		}

		return $usersObj;
	}

	public function UsersLoginInfo($username, $password){
		$query = $this->db->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
		$query->execute(array($username, $password));
		$userlogin = $query->fetch(PDO::FETCH_ASSOC);

		$count = $query->rowCount();
		return $count;
	}

	public function getAllPages(){
		$query = $this->db->query("SELECT `title`, `subtitle`, `id` FROM pages");
		$pagesArray = $query->fetchAll(PDO::FETCH_ASSOC);
		$pagesObj = [];

		foreach($pagesArray as $array){
			$pagesObj[] = new PageBean($array);
		}

		return $pagesObj;
	}

	public function getOnePage(){

	}
}
