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
        $query->select('id', 'titre', 'contenu');
        $query->from('posts');
        $query->where('id = 1');
        echo $query->getQuery();
    }
}