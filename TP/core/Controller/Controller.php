<?php
/**
 * POO_Graf - Controller.php
 * User: Trinh
 */

namespace Core\Controller;


class Controller
{
    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []) : void
    {
        ob_start();
        extract($variables, EXTR_SKIP);
        require $this->viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'templates/' . $this->template . '.php';
    }

    protected function forbidden() : void
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound() : void
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
//        header('Location:index.php?p=404');
    }
}