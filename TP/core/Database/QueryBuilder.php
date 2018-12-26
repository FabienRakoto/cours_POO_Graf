<?php
/**
 * POO_Graf - QueryBuilder.php
 * User: Trinh
 */

namespace Core\Database;


class QueryBuilder
{
    private $fields = [];
    private $from = [];
    private $conditions = [];


    public function select()
    {
        $this->fields = func_get_args();
        return $this;
    }

    public function from($table, $alias = null)
    {
        if($alias === null){
            $this->from[] = $table;
        } else {
            $this->from[] = "$table AS $alias";
        }
        return $this;
    }

    public function where()
    {
        foreach (func_get_args() as $arg) {
            array_push($this->conditions, $arg);
        }
        return $this;
    }

    public function getQuery()
    {
        return 'SELECT ' . implode(', ', $this->fields)
            . ' FROM ' . implode(', ', $this->from)
            . ' WHERE ' . implode(' AND ', $this->conditions);
    }
}