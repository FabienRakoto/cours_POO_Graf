<?php
/**
 * POO_Graf - App.php
 * User: Trinh
 */

namespace App;


class App
{


    private static $_instance;


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

}