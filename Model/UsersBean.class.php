<?php
class UsersBean{
	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;
	public $fk_upload;
	public $status = 0;

	public function __construct($array){
		foreach($array as $key=>$value){
			$this->{$key} = $value;
		}
	}

	public function toArray(){
		$array = [];
		$array['id'] = $this->id;
		$array['username'] = $this->username;
		$array['password'] = $this->password;
		$array['firstname'] = $this->firstname;
		$array['lastname'] = $this->lastname;
		$array['fk_upload'] = $this->fk_upload;
		$array['status'] = $this->status;
		return $array;
	}



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFkUpload()
    {
        return $this->fk_upload;
    }

    /**
     * @param mixed $fk_upload
     *
     * @return self
     */
    public function setFkUpload($fk_upload)
    {
        $this->fk_upload = $fk_upload;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
