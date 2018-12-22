<?php
/**
 * POO_Graf - add.php
 * User: Trinh
 */

use Core\HTML\BootstrapForm;

$app = App::getInstance();
$postTable = $app->getTable('Post');
if (!empty($_POST)){
    $result = $postTable->create([
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'category_id' => $_POST['category_id']
    ]);
    if($result){
        header('Location: admin.php?page=posts.edit&id=' . $app->getDb()->lastInsertId());
        ?>
            <div class="alert alert-success">L'article a bien été crée</div>
        <?php
    }
}
$categories = $app->getTable('Category')->extract('id', 'titre');
$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
