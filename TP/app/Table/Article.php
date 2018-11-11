<?php
/**
 * POO_Graf - Article.php
 * User: Trinh
 */

namespace App\Table;

use App\App;

class Article extends Table
{
    public static function getLast()
    {
        return App::getDatabase()->query('
              SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
              FROM articles 
              LEFT JOIN categories 
              ON category_id = categories.id
              ', __CLASS__);
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