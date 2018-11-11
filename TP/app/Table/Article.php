<?php
/**
 * POO_Graf - Article.php
 * User: Trinh
 */

namespace App\Table;

class Article
{
    public function getUrl()
    {
        return 'index.php?p=article&id=' .$this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0,100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

        return $html;
    }
}