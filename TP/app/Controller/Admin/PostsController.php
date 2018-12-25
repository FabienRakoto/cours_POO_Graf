<?php
/**
 * POO_Graf - PostsController.php
 * User: Trinh
 */

namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;
use App;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index()
    {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        $success = false;
        if (!empty($_POST)){
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                $success = true;
                return $this->index();
            }
        }
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.add', compact('categories', 'form', 'success'));
    }

    public function edit()
    {
        $success = false;
        if (!empty($_POST)){
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                $success = true;
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form', 'success'));
    }

    public function delete()
    {
        if (!empty($_POST)){
            $result = $this->Post->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

}