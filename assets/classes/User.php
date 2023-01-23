<?php
abstract class User {
    protected $id_user;
    protected $f_name;
    protected $l_name;
    protected $adress;
    protected $password;

    static public function getArticles(){
        $req = Db::connect()->query("SELECT ar.id_article , ar.title , ar.content , ar.date , ar.read_time , c.name AS 'cat_name' , CONCAT(au.f_name , ' ',au.l_name) 'author_name'
        FROM user u, author au, categorie c, article ar
        WHERE ar.id_user LIKE u.id_user
        AND ar.id_categorie LIKE c.id_categorie
        AND ar.id_author LIKE au.id_author");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    static public function getArticle($id_article){
        $req = Db::connect()->query("SELECT * FROM article where id_article like $id_article");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    static public function getCategories(){
        $req = Db::connect()->query("SELECT `id_categorie`, `name` FROM `categorie`");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function getAuthors(){
        $req = Db::connect()->query("SELECT `id_author`, CONCAT(`f_name`, ' ', `l_name`) as 'full_name'  FROM `author`");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}