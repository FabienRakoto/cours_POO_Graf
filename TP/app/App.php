<?php
/**
 * POO_Graf - App.php
 * User: Trinh
 */

use Core\Database\Database;
use Core\Config;

class App
{
    public $title = 'Mon super site';
    private static $_instance;
    private $db_instance;

    /**
     * @return App
     */
    public static function getInstance() : \App
    {
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    /**
     * @return Database
     */
    public function getDb() : Database
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
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

    public static function load() : void
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
}