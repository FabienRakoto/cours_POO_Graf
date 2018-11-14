<?php
/**
 * POO_Graf - Categorie.php
 * User: Trinh
 */

namespace App\Table;


class Categorie extends Table
{
    protected static $table = 'categories';

    public function getUrl() :string
    {
        return 'index.php?p=categorie&id=' .$this->id;
    }
}