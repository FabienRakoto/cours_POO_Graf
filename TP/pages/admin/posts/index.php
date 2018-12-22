<?php
/**
 * POO_Graf - index.php
 * User: Trinh
 */

$posts = App::getInstance()->getTable('Post')->all();
?>
<h1>Administrer les articles</h1>

<p>
    <a href="?page=posts.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
        <tr>
          <td>ID</td>
          <td>Titre</td>
          <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td>
                <a class="btn btn-primary" href="?page=posts.edit&id=<?= $post->id; ?>">Editer</a>
                <form action="?page=posts.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button class="btn btn-danger" href="?page=posts.delete&id=<?= $post->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$categories = App::getInstance()->getTable('Category')->all();
?>
<h1>Administrer les catégories</h1>

<p>
    <a href="?page=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->titre; ?></td>
            <td>
                <a class="btn btn-primary" href="?page=categories.edit&id=<?= $category->id; ?>">Editer</a>
                <form action="?page=categories.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>