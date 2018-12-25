<?php
/**
 * POO_Graf - index.phpdd
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
} elseif ($page === 'admin.posts.index'){
    $controller = new \App\Controller\Admin\PostsController();
    $controller->index();
} elseif ($page === 'login'){
    $controller = new \App\Controller\Admin\UsersController();
    $controller->login();
}