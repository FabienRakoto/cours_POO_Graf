<?php
/**
 * POO_Graf - index.php
 * User: Trinh
 */
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'home';
}

// Auth
$app = App::getInstance();
$auth =  new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($page === 'home'){
    require ROOT.'/pages/admin/posts/index.php';
} elseif ($page === 'posts.edit'){
    require ROOT . '/pages/admin/posts/edit.php';
} elseif ($page === 'posts.category') {
    require ROOT.'/pages/admin/posts/category.php';
}
$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';
