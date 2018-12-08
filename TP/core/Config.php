<?php
/**
 * POO_Graf - Config.php
 * User: Trinh
 */

namespace Core;


class Config
{
    private $settings = [];
    private static $_instance;

    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public static function getInstance($file) : Config
    {
        if(self::$_instance === null){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function get($key)
    {
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }

}

/*
 __DIR__ : pour pointer à vers le dossier app
dirname(__DIR__) : remonter d'un cran
 */