<?php
/**
 * POO_Graf - category.php
 * User: Trinh
 */
$app = App::getInstance();
$category = $app->getTable('Category')->find($_GET['id']);
if($category === false){
    $app->notFound();
}

$posts = $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->all();


?>
<h1><?= $app->title = $category->titre; ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($posts as $post): ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->category; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><a href="<?= $category->url; ?>"><?= $category->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

