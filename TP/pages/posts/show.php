<?php

$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);
if($post === false){
    $app->notFound();
}
$app->title = $post->titre;

?>
<h1><?= $post->titre; ?></h1>
<em><?= $post->category; ?></em>
<p><?= $post->contenu; ?></p>
