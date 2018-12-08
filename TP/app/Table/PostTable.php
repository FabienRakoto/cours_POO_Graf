<?php
/**
 * POO_Graf - PostsTableble.php
 * User: Trinh
 */
namespace App\Table;

use App\Entity\PostEntity;
use Core\Table\Table;

class PostTable extends Table
{
    /**
     * Récupérer les derniers posts
     * @return array
     */
    public function last() : array
    {
        return $this->query('
        SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as category
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY posts.date DESC');
    }

    /**
     * Récupérer un post en liant la category associé
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function find($id) : PostEntity
    {
        return $this->query('
        SELECT posts.id, posts.titre, posts.contenu, categories.titre as category
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE posts.id = ? ',
        [$id], true);
    }

    /**
     * Récupérer les derniers posts de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id) : array
    {
        return $this->query('
        SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as category
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE posts.category_id = ?
        ORDER BY posts.date DESC ',
        [$category_id]);
    }
}