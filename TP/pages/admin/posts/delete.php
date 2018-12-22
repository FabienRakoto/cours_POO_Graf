<?php
/**
 * POO_Graf - delete.php
 * User: Trinh
 */

$app = App::getInstance();
$postTable = $app->getTable('Post');
if (!empty($_POST)){
    $result = $postTable->delete($_POST['id']);
    if($result){
        header('Location: admin.php');
    }
}
