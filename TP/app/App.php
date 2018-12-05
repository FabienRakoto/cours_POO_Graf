<?php
/**
 * POO_Graf - App.php
 * User: Trinh
 */

namespace App;


class App
{
    public $title = 'Mon super site';
    private static $_instance;
    private $db_instance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name();
    }

    public function getDb()
    {
        $config = Config::getInstance();
        if ($this->db_instance === null) {
             $this->db_instance = new Database(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }
        return $this->db_instance;
    }
}