<?php

/*
`id`, `title`, `subttitle`, `content`
 */


class PageBean{

  private $id;
  private $title;
  private $subtitle;
  private $content;

  function __construct($p = ["id", "title", "subtitle", "content"]){
      $this->id = $p["id"];
      $this->title = $p["title"];

      if(isset( $p["subtitle"] ) ):
        $this->subtitle = $p["subtitle"];
      else :
        $this->subtitle = "";
      endif;

      if(isset( $p["content"] ) ):
        $this->content = $p["content"];
      else :
        $this->content = "";
      endif;

  }


  public function getId(){
    return $this->id;
  }


  public function setId($id){
    $this->id = $id;
    return $this;
  }


  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
    return $this;
  }

  public function getSubtitle(){
  return $this->subtitle;
  }


  public function setSubtitle($subtitle){
    $this->subtitle = $subtitle;
    return $this;
  }

  public function getContent(){
    return $this->content;
  }

  public function setContent($content){
    $this->content = $content;
    return $this;
  }
}
