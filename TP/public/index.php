<?php
/**
 * POO_Graf - index.php
 * User: Trinh
 */
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'home';
}

if($page === 'home') {
    $controller = new \App\Controller\PostsController();
    $controller->index();
} elseif ($page === 'posts.show'){
    $controller = new \App\Controller\PostsController();
    $controller->show();
} elseif ($page === 'posts.category'){
    $controller = new \App\Controller\PostsController();
    $controller->category();
} elseif ($page === 'login'){
    $controller = new \App\Controller\UsersController();
    $controller->login();
}


//
//ob_start();
//if($page === 'home'){
//    require ROOT.'/Views/posts/home.php';
//} elseif ($page === 'posts.show'){
//    require ROOT.'/Views/posts/show.php';
//} elseif ($page === 'posts.category') {
//    require ROOT.'/Views/posts/category.php';
//} elseif ($page === 'login') {
//    require ROOT.'/Views/users/login.php';
//}
//$content = ob_get_clean();
//
//require ROOT.'/Views/templates/default.php';
