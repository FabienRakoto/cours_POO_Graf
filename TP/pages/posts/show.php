<?php

$app = App::getInstance();
$post = $app->getTable('Post')->findWithCategory($_GET['id']);
if($post === false){
    $app->notFound();
}
$app->title = $post->titre;

?>
<h1><?= $post->titre; ?></h1>
<p>Crée le : <?= $post->date; ?></p>
<em>Catégorie : <?= $post->category; ?></em>
<p><?= $post->contenu; ?></p>
