<?php
/**
 * POO_Graf - Table.php
 * User: Trinh
 */

namespace App\Table;

use App\App;

class Table
{
    protected static $table;

    private static function getTable()
    {
        if(static::$table === null) {
            $class_name = explode('\\', static::class);
            static::$table = strtolower(end($class_name)) . 's';
        }
        return static::$table;
    }

    public static function find($id)
    {
        return static::query('
        SELECT *
        FROM '.static ::getTable().'
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
              FROM '. static::getTable() . '
              ', static::class);
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}