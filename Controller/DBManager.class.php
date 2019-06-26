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

	public function getOnePage($id){
		$query = $this->db->prepare("SELECT * from pages WHERE id=:id");
		$query->execute(["id"=>$id]);
		$thePage = $query->fetch( PDO::FETCH_ASSOC );

		if($thePage){
			$thePage = new PageBean($thePage);
		}

		return $thePage;
	}

	public function getApplication(){
		$query = $this->db->query("SELECT `smallcontact`, `title`, `logo_fk` FROM application");
		$contactform = $query->fetch(PDO::FETCH_ASSOC);

		return $contactform;
	}

	public function getLogo(){
		$query = $this->db->query("SELECT `logo_fk` from application ");
		$getlogokey = $query->fetch(PDO::FETCH_ASSOC);

		$logoQ = $this->db->prepare("SELECT * FROM uploads WHERE id=:id");
		$logoQ->execute(array("id"=>$getlogokey["logo_fk"]));
		$logo = $logoQ->fetch(PDO::FETCH_ASSOC);

		return $logo;
		die();
		
	}

	public function getFooter(){
		$query = $this->db->query("SELECT `owner_fk` FROM application ");
		$getownerkey = $query->fetch(PDO::FETCH_ASSOC);

		$ownerQ = $this->db->prepare("SELECT * FROM users WHERE id=:id");
		$ownerQ->execute(array("id"=>$getownerkey["owner_fk"]));
		$owner = $ownerQ->fetch(PDO::FETCH_ASSOC);

		return $owner;
	}
}

