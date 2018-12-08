<?php
/**
 * POO_Graf - PostsTableble.php
 * User: Trinh
 */
namespace App\Table;

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
        SELECT posts.id, posts.titre, posts.contenu, posts.date, categories.titre as categorie
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY posts.date DESC');
    }

    public function find($id)
    {
        return $this->query('
        SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE posts.id = ? ',
        [$id], true);
    }

    public function lastByCategory($categorie_id)
    {
        return $this->query('
        SELECT posts.id, posts.titre, posts.contenu, categories.titre as categorie
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE category_id = ?
        ORDER BY posts.date DESC ',
        [$categorie_id]);
    }
}