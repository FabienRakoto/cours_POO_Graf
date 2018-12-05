<?php
/**
 * POO_Graf - categorie.php
 * User: Trinh
 */
use App\Table\PostsTable;
use App\Table\CategoriesTable;
use App\App;

$categorie = CategoriesTable::find($_GET['id']);
if($categorie === false){
    App::notFound();
}

$articles = PostsTable::lastByCategory($_GET['id']);
$categories = CategoriesTable::all();


?>
<h1><?= $categorie->titre; ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($articles as $post): App::setTitle($post->titre); ?>

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

