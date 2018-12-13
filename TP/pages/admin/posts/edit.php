<?php
/**
 * POO_Graf - edit.php
 * User: Trinh
 */

use Core\HTML\BootstrapForm;

// récupérer mon article
$post = App::getInstance()->getTable('Post')->find($_GET['id']);
$form = new BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
