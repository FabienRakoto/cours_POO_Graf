<?php
/**
 * POO_Graf - index.php
 * User: Trinh
 */

require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\App::getInstance();

$posts = $app->getTable('Posts');




