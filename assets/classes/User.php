<?php
abstract class User {
    private $id_user;
    private $f_name;
    private $l_name;
    private $adress;
    private $password;

    public function ListArticles(){
        $req = Db::connect()->query("SELECT ar.id_article , ar.title , ar.content , ar.date , c.name , CONCAT(au.f_name , ' ',au.l_name) 'author_name' 
        FROM user u, author au, categorie c, article ar
        WHERE ar.id_user LIKE u.id_user
        AND ar.id_categorie LIKE c.id_categorie
        AND ar.id_author LIKE au.id_author");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}