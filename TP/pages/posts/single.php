<?php


$post = App::getInstance()->getTable('Post')->find($_GET['id']);
if($post === false){
    App::getInstance()->notFound();
}
App::getInstance()->title;

?>
<h1><?= $post->titre; ?></h1>
<em><?= $post->categorie; ?></em>
<p><?= $post->contenu; ?></p>
