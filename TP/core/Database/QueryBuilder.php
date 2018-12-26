<?php
/**
 * POO_Graf - QueryBuilder.php
 * User: Trinh
 */

namespace Core\Database;


class QueryBuilder
{
    private $select = [];
    private $from = [];
    private $where = [];


    public function select()
    {
        $this->select = func_get_args();
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
        $this->where = func_get_args();
        return $this;
    }

    public function getQuery()
    {
        return 'SELECT' . implode(', ', $this->select)
            . 'FROM ' . implode(', ', $this->from)
            . 'WHERE ' . implode(' AND ', $this->where);
    }
}