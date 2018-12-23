<?php
/**
 * POO_Graf - UsersController.php
 * User: Trinh
 */

namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use App;

class UsersController extends AppController
{
    public function login()
    {
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?page=admin.posts.index');
            }
            $errors = true;
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
}