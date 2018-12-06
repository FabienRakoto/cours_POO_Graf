<?php
/**
 * POO_Graf - Table.php
 * User: Trinh
 */

namespace App\Table;

use App\Database\Database;

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
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM articles');
    }
}