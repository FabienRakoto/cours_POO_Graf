<?php
/**
 * POO_Graf - AppController.php
 * User: Trinh
 */

namespace App\Controller;


use Core\Controller\Controller;
use \App;

class AppController extends Controller
{
    protected $template = 'default';


    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($modelName)
    {
        $this->$modelName = App::getInstance()->getTable($modelName);
    }
}