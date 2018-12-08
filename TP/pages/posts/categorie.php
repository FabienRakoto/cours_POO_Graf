<?php
/**
 * POO_Graf - categorie.php
 * User: Trinh
 */


$categorie = App::getInstance()->getTable('Category')->find($_GET['id']);
if($categorie === false){
    App::getInstance()->getTable('Category')->notFound();
}

$posts = App::getInstance()->getTable('Post')->lastByCategory($_GET['id']);
$categories = App::getInstance()->getTable('Category')->all();


?>
<h1><?= $categorie->titre; ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($posts as $post): ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

