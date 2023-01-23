<?php
include_once $_SERVER['DOCUMENT_ROOT']."/planet-dev/assets/includes/autoload.php";

if(isset($_POST['login'])) login();
if(isset($_POST['logout'])) logout();
if(isset($_POST['list'])) getArticles();
if(isset($_POST['id_article'])) getArticle();
if(isset($_POST['addArtcl'])) addArticles();
if(isset($_POST['delArtcl'])) deleteArticles();
if(isset($_POST['categories'])) categories();
if(isset($_POST['authores'])) authores();


function login(){
    session_start();
    $adress = $_POST['adress'];
    $password = $_POST['password'];
    $user = Authentification::login($adress,$password);
    if(!empty($user)){
        $id_user = (int)$user[0]['id_user'];
        $role = $user[0]['role'];
        $f_name = $user[0]['f_name'];
        $l_name = $user[0]['l_name'];
        $_SESSION['user'] = new $role($id_user,$f_name,$l_name);
        header('location: dashboard.php');
    }else{
        $GLOBALS['message'] = 'adress or password are incorrect';
    }
}

function logout(){
    session_destroy();
    header('location: index.php');
}
function getArticles(){
    echo json_encode(User::getArticles());
}
function getArticle(){
    $id_article = $_POST['id_article'];
    echo json_encode(User::getArticle($id_article));
}
function addArticles(){
    // $json = '[{"title":"ttttttttttt","content":"ttttttttttttt","date":"2023-01-17","id_categorie":3,"id_author":1}]';
    // $articles = json_decode($json);
    $articles = json_decode($_POST['articles']);
    foreach ($articles as $key => $value) {
        $article = new Article(null,$value->title, $value->content, $value->date , $value->id_categorie , $value->id_author);
        echo $_SESSION['user']->AddArticle($article);
    }
    $GLOBALS['message'] = 'Article(s) where added succesfully';
}
function updateArticles(){
    // $json = '[{"id_article":1,"title":"updated","content":"updated","date":"2023-01-17","id_categorie":3,"id_author":1}]';
    $articles = json_decode($_POST['articles']);
    $article = json_decode($json);
    $articleObj = new Article($article[0]->id_article, $article[0]->title, $article[0]->content, $article[0]->date , $article[0]->id_categorie , $article[0]->id_author);
    $_SESSION['user']->UpdateArticle($articleObj);
}
function deleteArticles(){
    $id_article = $_POST['id_article'];
    $_SESSION['user']->DeleteArticle($id_article);
}
function statistics(){
    return $_SESSION['user']->Statistics();
}
function categories(){
    $all_categories = User::getCategories();
    echo json_encode($all_categories);
}
function authores(){
    $all_authores = User::getAuthors();
    echo json_encode($all_authores);
}