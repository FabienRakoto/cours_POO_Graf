<?php
/**
 * POO_Graf - Table.php
 * User: Trinh
 */

namespace App\Table;

use App\App;

class Table
{

    public static function find($id)
    {
        return static::query('
        SELECT *
        FROM '.static::$table.'
        WHERE id = ?
        ', [$id], true);
    }

    public static function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return App::getDatabase()->prepare($statement, $attributes, static::class, $one);
        }
        return App::getDatabase()->query($statement, static::class, $one);

    }

    public static function all() :array
    {
        return App::getDatabase()->query('
              SELECT *
              FROM '. static::$table . '
              ', static::class);
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}