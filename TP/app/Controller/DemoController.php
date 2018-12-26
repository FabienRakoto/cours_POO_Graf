<?php
/**
 * POO_Graf - DemoController.php
 * User: Trinh
 */

namespace App\Controller;


use Core\Database\QueryBuilder;

class DemoController extends AppController
{
    public function index()
    {
        $query = new QueryBuilder();
        echo $query
            ->select('id', 'titre', 'contenu')
            ->from('posts', 'posts')
            ->where('posts.category_id = 1')
            ->where('posts.date > NOW()');
    }
}