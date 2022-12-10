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

    public static function getInstance(): ?Core
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function initialize(): void
    {

    }

    public function run(): void
    {
        if (isset($_GET['route'])) {
            $route = $_GET['route'];
            $routeParts = explode('/', $route);
            $moduleName = strtolower(array_shift($routeParts));
            $actionName = strtolower(array_shift($routeParts));
        }

        if (empty($moduleName) || empty($actionName)) {
            $moduleName = 'site';
            $actionName = 'index';
        }

        $this->app['moduleName'] = $moduleName;
        $this->app['actionName'] = $actionName;
        if(isset($_GET['language']))
            $this->app['language'] = $_GET['language'];
        else
            $this->app['language'] = 'eng';

        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';

        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $controllerActionName)) {
                $this->app['actionResult'] = $controller->$controllerActionName();
                $this->app['pageTitle'] = 'Raccoons Courses - ' . ucfirst($moduleName);
            } else {
                $statusCode = 404;
            }
        } else {
            $statusCode = 404;
        }

        $statusCodeType = intval($statusCode / 100);
        if ($statusCodeType == 4 || $statusCodeType == 5) {
            $this->app['moduleName'] = 'site';
            $this->app['actionName'] = 'error';
            $siteController = new SiteController();
            $this->app['actionResult'] = $siteController->errorAction($statusCode);
            $this->app['pageTitle'] = 'Raccoons Courses - Error';
        }
    }

    public function done(): void
    {
        $pathToLayout = "themes/light/layout.php";

        $templateMaker = new TemplateMaker($pathToLayout);
        $templateMaker->setParam('content', $this->app['actionResult']);
        $templateMaker->setParam('title', $this->app['pageTitle']);
        $html = $templateMaker->getHTML();

        echo $html;
    }
}