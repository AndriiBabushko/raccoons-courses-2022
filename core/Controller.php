<?php

namespace core;

class Controller
{
    protected string $viewPath;

    public function __construct()
    {
        $moduleName = \core\Core::getInstance()->app['moduleName'];
        $actionName = \core\Core::getInstance()->app['actionName'];
        $this->viewPath = "views/{$moduleName}/{$actionName}.php";
    }

    public function render($viewPath = null, $params = null): bool|string
    {
        if (empty($viewPath))
            $viewPath = $this->viewPath;

        $templateMaker = new TemplateMaker($viewPath);

        if (!empty($params)) {
            $templateMaker->setParams($params);
        }

        return $templateMaker->getHTML();
    }
}