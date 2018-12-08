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

ob_start();
if($page === 'home'){
    require ROOT . '/pages/posts/home.php';
} elseif ($page === 'posts'){
    require ROOT . '/pages/posts/single.php';
} elseif ($page === 'categorie') {
    require ROOT.'/pages/posts/categorie.php';
}
$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';
