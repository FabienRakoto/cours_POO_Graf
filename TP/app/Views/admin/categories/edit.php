<?php
/**
 * POO_Graf - edit.php
 * User: Trinh
 */

use Core\HTML\BootstrapForm;

$app = App::getInstance();
$categoryTable = $app->getTable('Category');
if (!empty($_POST)){
    $result = $categoryTable->update($_GET['id'], [
            'titre' => $_POST['titre'],
    ]);
    if($result){
        ?>
            <div class="alert alert-success">La catégorie a bien été modifiée</div>
        <?php
    }
}
// récupérer mon catégorie
$category = $categoryTable->find($_GET['id']);
$form = new BootstrapForm($category);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
