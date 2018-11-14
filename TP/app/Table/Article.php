<?php
/**
 * POO_Graf - Article.php
 * User: Trinh
 */

namespace App\Table;

use App\App;

class Article extends Table
{
    protected static $table = 'articles';

    public static function getLast()
    {
        return self::query('
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles 
            LEFT JOIN categories 
              ON category_id = categories.id');
    }

    public static function lastByCategory($categorie_id)
    {
        return self::query('
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles 
            LEFT JOIN categories 
              ON category_id = categories.id
            WHERE category_id = ?
            ', [$categorie_id]);
    }

    public function getUrl() :string
    {
        return 'index.php?p=article&id=' .$this->id;
    }

    public function getExtrait() :string
    {
        $html = '<p>' . substr($this->contenu, 0,100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

        return $html;
    }
}