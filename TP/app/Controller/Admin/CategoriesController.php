<?php
/**
 * POO_Graf - CategoriesController.php
 * User: Trinh
 */

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use App;

class CategoriesController extends AppController
{
     public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index()
    {
        $categories = $this->Category->all();
        $this->render('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        if (!empty($_POST)){
            $this->Category->create([
                'titre' => $_POST['titre']
            ]);
            return $this->index();

        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.add', compact( 'form'));
    }

    public function edit()
    {
        if (!empty($_POST)){
            $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $categorie = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($categorie);
        $this->render('admin.categories.add', compact('form'));
    }

    public function delete()
    {
        if (!empty($_POST)){
            $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}