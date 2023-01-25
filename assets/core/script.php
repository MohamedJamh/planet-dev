<?php
include_once $_SERVER['DOCUMENT_ROOT']."/planet-dev/assets/includes/autoload.php";

session_start();



if(isset($_POST['login'])) login();
if(isset($_POST['logout'])) logout();
if(isset($_POST['list'])) getArticles();
if(isset($_POST['id_article'])) getArticle();
if(isset($_POST['addedArticles'])) addArticles();
if(isset($_POST['updatedArticle'])) updateArticle();
if(isset($_POST['deletedArticle'])) deleteArticle();
if(isset($_POST['categories'])) categories();
if(isset($_POST['authores'])) authores();
if(isset($_POST['getStatistics'])) statistics();


function login(){
    $adress = $_POST['adress'];
    $password = $_POST['password'];
    $user = Authentification::login($adress,$password);
    if(!empty($user)){
        $id_user = (int)$user[0]['id_user'];
        $role = $user[0]['role'];
        $f_name = $user[0]['f_name'];
        $l_name = $user[0]['l_name'];
        $_SESSION['user'] = new $role($id_user,$f_name,$l_name);
        header('location: /planet-dev/');
    }else{
        $GLOBALS['message'] = 'adress or password are incorrect';
    }
}

function logout(){
    session_destroy();
    header('location: index.php');
}
function getArticles(){
    $order_by = $_POST['order_by'];
    $order = $_POST['order'];
    echo json_encode(User::getArticles($order_by, $order));
}
function getArticle(){
    $id_article = $_POST['id_article'];
    echo json_encode(User::getArticle($id_article));
}
function addArticles(){
    $articles = json_decode($_POST['addedArticles']);
    foreach ($articles as $key => $value) {
        $article = new Article(null,$value->title, $value->content, $value->date , $value->read_time , $value->categorie , $value->author);
        $_SESSION['user']->AddArticle($article);
    }
    $GLOBALS['message'] = 'Article(s) where added succesfully';
}
function updateArticle(){
    $article = json_decode($_POST['updatedArticle']);
    $articleObj = new Article($article->id_article, $article->title, $article->content, null ,$article->read_time, $article->id_categorie , $article->id_author);
    $_SESSION['user']->UpdateArticle($articleObj);
}
function deleteArticle(){
    $id_article = $_POST['deletedArticle'];
    $_SESSION['user']->DeleteArticle($id_article);
}
function statistics(){
    echo json_encode($_SESSION['user']->Statistics());
}
function categories(){
    $all_categories = User::getCategories();
    echo json_encode($all_categories);
}
function authores(){
    $all_authores = User::getAuthors();
    echo json_encode($all_authores);
}