<?php
class Article {
    private $id;
    private $title;
    private $content;
    private $date;
    private $id_categorie;
    private $id_author;
    private $id_user;

    public function __construct($id,$title,$content,$date,$id_categorie,$id_author){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content ;
        $this->date = $date;
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
    public function getCategorie(){
        return $this->id_categorie;
    }
    public function getAuthor(){
        return $this->id_author;
    }
}