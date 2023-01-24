<?php
class Admin extends User {

    public function __construct($id,$f_name,$l_name){
        $this->id_user = $id;
        $this->f_name = $f_name;
        $this->l_name = $l_name;
    }

    public function AddArticle($article){
        $title = $article->getTitle();
        $content = $article->getContent();
        $date = $article->getDate();
        $id_categorie = $article->getCategorie();
        $id_author = $article->getAuthor();
        $id_user = $this->id_user;
        Db::connect()->query("INSERT INTO `article`(`title`, `content`, `date`, `id_categorie`, `id_author`, `id_user`) VALUES ('$title','$content','$date','$id_categorie','$id_author','$id_user')");
    }
    public function UpdateArticle($article){
        $id_article = $article->getId();
        $title = $article->getTitle();
        $content = $article->getContent();
        $date = $article->getDate();
        $read_time = $article->getReadTime();
        $id_categorie = $article->getCategorie();
        $id_author = $article->getAuthor();
        $id_user = $this->id_user;
        Db::connect()->query("UPDATE `article` SET `title`='$title',`content`='$content',`read_time`='$read_time',`id_categorie`='$id_categorie',`id_author`='$id_author',`id_user`='$id_user'
        WHERE `id_article`='$id_article'");
    }

    public function DeleteArticle($id_article){
        Db::connect()->query("DELETE FROM `article` WHERE `id_article`='$id_article'");
    }

    public function Statistics(){
        $tables = array("user","article","categorie");
        $statistics = array();
        foreach ($tables as $table_name) {
            $req = Db::connect()->query("SELECT COUNT(*) FROM $table_name");
            $key_name = $table_name . "Count";
            $statistics[$key_name] = $req->fetchColumn();
        }
        return $statistics;
    }
}