<?php
class Authentification{
    static public function login($adress,$password){
        $req = Db::connect()->query("SELECT id_user , role , f_name , l_name FROM user WHERE adress LIKE '$adress' AND password LIKE '$password'");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}