<?php
/**
 * POO_Graf - Entity.php
 * User: Trinh
 */

namespace Core\Entity;


class Entity
{
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }
}