<?php

session_start();

if(isset($_POST['login'])) login();
if(isset($_POST['logout'])) logout();
if(isset($_POST['list_articles'])) listArticles();

function login(){
    $adress = $_POST['adress'];
    $password = $_POST['password'];
    $user = Authentification::login($adress,$password);
    if(!empty($user)){
        $role = $user[0]['role'];
        $_SESSION['user'] = new $role;
        header('location: dashboard.php');
    }else{
        $GLOBALS['message'] = 'adress or password are incorrect';
    }
}

function logout(){
    session_destroy();
    header('location: index.php');
}
function listArticles(){
    $articles = $_SESSION['user']->ListArticles();
    echo json_encode($articles);
}
function addArticles(){
    $json = '[{"id_article":"1","title":"This is a title for article 1","content":"this is a brief description for article 1","date":"2023-01-16","name":"Technologie","author_name":"Harry Clarison"},{"id_article":"2","title":"This is a title for article 2","content":"this is a brief description for article 2","date":"2023-01-15","name":"Science","author_name":"Harry Clarison"}]';
    var_dump(json_decode($json));
}



