<?php
/**
 * POO_Graf - add.php
 * User: Trinh
 */

use Core\HTML\BootstrapForm;

$app = App::getInstance();
$categoryTable = $app->getTable('Category');
if (!empty($_POST)){
    $result = $categoryTable->create([
            'titre' => $_POST['titre']
    ]);
    if($result){
        header('Location: admin.php?page=caterories.edit&id=' . $app->getDb()->lastInsertId());
    }
}
$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
