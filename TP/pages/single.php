<?php

use App\App;
use App\Table\PostsTable;


$post = PostsTable::find($_GET['id']);
if($post === false){
    App::notFound();
}
App::setTitle($post->titre);

?>
<h1><?= $post->titre; ?></h1>
<em><?= $post->categorie; ?></em>
<p><?= $post->contenu; ?></p>
