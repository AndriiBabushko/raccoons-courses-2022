<?php

namespace core;

use controllers\SiteController;

class Core
{
    private static $instance = null;
    public $app;

    private function __construct()
    {
        $this->app = [];
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function initialize()
    {

    }

    public function run()
    {
        if (isset($_GET['route'])) {
            $route = $_GET['route'];
            $routeParts = explode('/', $route);

            $moduleName = strtolower(array_shift($routeParts));
            $actionName = strtolower(array_shift($routeParts));
        }

        if (empty($moduleName)) {
            $moduleName = 'site';
        }
        if (empty($actionName)) {
            $actionName = 'index';
        }

        $this->app['moduleName'] = $moduleName;
        $this->app['actionName'] = $actionName;

        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';

        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $controllerActionName)) {
                $this->app['actionResult'] = $controller->$controllerActionName();

            } else {
                $statusCode = 404;
            }
        } else {
            $statusCode = 404;
        }

        $statusCodeType = intval($statusCode / 100);
        if ($statusCodeType == 4 || $statusCodeType == 5) {
            $siteController = new SiteController();
            $siteController->errorAction($statusCode);
        }
    }

    public function done()
    {
        $pathToLayout = "themes/light/layout.php";

        $templateMaker = new TemplateMaker($pathToLayout);
        $templateMaker->setParam('content', $this->app['actionResult']);
        $html = $templateMaker->getHTML();

        echo $html;
    }
}