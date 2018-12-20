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

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if ($this->table === null) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return array|bool|false|mixed|\PDOStatement
     */
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

    /**
     * @param $id
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function find($id)
    {
        return $this->query('SELECT * FROM ' . $this->table . ' WHERE id = ? ', [$id], true);
    }

    /**
     * @param $id
     * @param $fields
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_parts = implode(',',$sql_parts);
        return $this->query('UPDATE ' . $this->table . ' SET '. $sql_parts . ' WHERE id = ?', $attributes, true);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value) : array
    {
        $records = $this->all();
        // définir un tableau de sortie
        $return = [];
        //Pour tout les enregistrements, on crée un tableau
        foreach ($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

}