<?php
/**
 * POO_Graf - edit.php
 * User: Trinh
 */

use Core\HTML\BootstrapForm;

$app = App::getInstance();
$postTable = $app->getTable('Post');
if (!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'category_id' => $_POST['category_id']
    ]);
    if($result){
        ?>
            <div class="alert alert-success">L'article a bien été modifié</div>
        <?php
    }
}
// récupérer mon article
$post = $postTable->find($_GET['id']);
$categories = $app->getTable('Category')->extract('id', 'titre');
$form = new BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
