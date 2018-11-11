<?php
/**
 * POO_Graf - Categorie.php
 * User: Trinh
 */

namespace App\Table;


class Categorie
{
    private static $table = 'categories';

    public static function all()
    {
        return App::getDatabase()->query('
              SELECT *
              FROM '. self::$table . '
              ', __CLASS__);
    }
}