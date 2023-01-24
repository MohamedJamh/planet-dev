<?php
class Article {
    private $id;
    private $title;
    private $content;
    private $date;
    private $read_time;
    private $id_categorie;
    private $id_author;
    private $id_user;

    public function __construct($id,$title,$content,$date,$read_time,$id_categorie,$id_author){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content ;
        $this->date = $date;
        $this->read_time = $read_time;
        $this->id_categorie = $id_categorie;
        $this->id_author = $id_author;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getDate(){
        return $this->date;
    }
    public function getReadTime(){
        return $this->read_time;
    }
    public function getCategorie(){
        return $this->id_categorie;
    }
    public function getAuthor(){
        return $this->id_author;
    }
}