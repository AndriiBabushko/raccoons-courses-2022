<?php

namespace core;

use controllers\SiteController;
use models\Error;

class Core
{
    private static $instance = null;
    public array $app;
    public DB $db;
    public string $requestMethod;

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
        session_start();
        $this->db = new DB(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE_BASENAME);
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function run(): void
    {
        $routeParts = [];

        if (isset($_GET['route'])) {
            $route = $_GET['route'];
            $routeParts = explode('/', $route);
            if (count($routeParts) >= 3) {
                $moduleName = strtolower(array_shift($routeParts));
                $language = strtolower(array_shift($routeParts));
                $actionName = strtolower(array_shift($routeParts));
            }
        }

        if (empty($moduleName) || empty($actionName) || empty($language)) {
            $moduleName = 'site';
            $language = 'eng';
            $actionName = 'index';
        }

        if (!empty($_GET['language']))
            if ($_GET['language'] == 'eng' || $_GET['language'] == 'ukr')
                $language = $_GET['language'];


        $this->app['moduleName'] = $moduleName;
        $this->app['actionName'] = $actionName;
        $this->app['language'] = $language;
        if (empty($_SESSION['theme']))
            $this->app['theme'] = 'light';
        else
            $this->app['theme'] = $_SESSION['theme'];

        if (!empty($_GET['theme']))
            if ($_GET['theme'] == 'light' || $_GET['theme'] == 'dark') {
                $_SESSION['theme'] = $_GET['theme'];
                $this->app['theme'] = $_GET['theme'];
            }

        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';

        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $controllerActionName)) {
                $actionResult = $controller->$controllerActionName($routeParts);

                if ($actionResult instanceof Error)
                    $statusCode = $actionResult->code;

                $this->app['actionResult'] = $actionResult;
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
        $pathToLayout = "themes/{$this->app['theme']}/layout.php";

        $templateMaker = new TemplateMaker($pathToLayout);
        $templateMaker->setParam('content', $this->app['actionResult']);
        $templateMaker->setParam('language', $this->app['language']);
        $templateMaker->setParam('theme', $this->app['theme']);
        $templateMaker->setParam('title', $this->app['pageTitle']);
        $html = $templateMaker->getHTML();

        echo $html;
    }
}