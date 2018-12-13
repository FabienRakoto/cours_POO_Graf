<?php
/**
 * POO_Graf - login.php
 * User: Trinh
 */
use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

if(!empty($_POST)){
    $auth = new DBAuth(App::getInstance()->getDb());
    if($auth->login($_POST['username'], $_POST['password'])){
        die('Connecte');
    }
    die('Pas connecte');
}
$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
