<?php
/**
 * POO_Graf - Table.php
 * User: Trinh
 */

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $db;
    protected $table;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if ($this->table === null) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }

    }

    public function find($id)
    {
        return $this->query('SELECT * FROM ' . $this->table . ' WHERE id = ? ', [$id], true);
    }

    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        header('Location:index.php?p=404');
    }
}