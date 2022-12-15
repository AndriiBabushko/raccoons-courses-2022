<?php

namespace core;

class Controller
{
    protected string $viewPath;
    protected string $language;
    protected string $theme;

    public function __construct()
    {
        $moduleName = \core\Core::getInstance()->app['moduleName'];
        $actionName = \core\Core::getInstance()->app['actionName'];
        $language = \core\Core::getInstance()->app['language'];
        $theme = \core\Core::getInstance()->app['theme'];

        $this->language = $language;
        $this->theme = $theme;
        $this->viewPath = "views/{$theme}/{$moduleName}/{$language}/{$actionName}.php";
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