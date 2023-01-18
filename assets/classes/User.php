<?php
abstract class User {
    protected $id_user;
    protected $f_name;
    protected $l_name;
    protected $adress;
    protected $password;

    static public function getArticles(){
        $req = Db::connect()->query("SELECT ar.id_article , ar.title , ar.content , ar.date , c.name AS 'cat_name' , CONCAT(au.f_name , ' ',au.l_name) 'author_name' 
        FROM user u, author au, categorie c, article ar
        WHERE ar.id_user LIKE u.id_user
        AND ar.id_categorie LIKE c.id_categorie
        AND ar.id_author LIKE au.id_author");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}