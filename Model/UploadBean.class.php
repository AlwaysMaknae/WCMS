<?php


/**
 *
 */
class UploadBean{

  private $id;
  private $file;
  private $title;
  private $alt;

  static $directory = "uploads/";

  function __construct($upload = ["id","file", "title", "alt" ]){

    if( isset($upload["id"]) ):
      $this->id = $upload["id"];
    else:
      $this->id = null;
    endif;

    $this->file = $upload["file"];
    $this->title = $upload["title"];
    $this->alt = $upload["alt"];
  }

  static function setDirectory($directory){
    self::$directory = $directory;
  }

    /**
     * Get the value of Id
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of Id
     * @param mixed id
     * @return self
     */
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of File
     * @return mixed
     */
    public function getFile($forDisplay = true){
      $out = "";
      if( $forDisplay ){
        $out .= self::$directory;
      }
      $out .= $this->file;

        return $out;
    }

    /**
     * Set the value of File
     * @param mixed file
     * @return self
     */
    public function setFile($file){
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of Title
     * @return mixed
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set the value of Title
     * @param mixed title
     * @return self
     */
    public function setTitle($title){
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Alt
     * @return mixed
     */
    public function getAlt(){
        return $this->alt;
    }

    /**
     * Set the value of Alt
     * @param mixed alt
     * @return self
     */
    public function setAlt($alt){
        $this->alt = $alt;

        return $this;
    }

}
