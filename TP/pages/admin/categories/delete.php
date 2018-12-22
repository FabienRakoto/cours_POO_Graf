<?php
/**
 * POO_Graf - delete.php
 * User: Trinh
 */

$app = App::getInstance();
$categoryTable = $app->getTable('Category');
if (!empty($_POST)){
    $result = $categoryTable->delete($_POST['id']);
    if($result){
        header('Location: admin.php');
    }
}
