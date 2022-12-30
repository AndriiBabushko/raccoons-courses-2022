<?php

namespace core;

use JetBrains\PhpStorm\NoReturn;
use models\Error;

class Controller
{
    protected string $viewPath;
    protected string $moduleName;
    protected string $actionName;
    protected string $language;
    protected string $theme;

    public function __construct()
    {
        $this->moduleName = \core\Core::getInstance()->app['moduleName'];
        $this->actionName = \core\Core::getInstance()->app['actionName'];
        $this->language = \core\Core::getInstance()->app['language'];
        $this->theme = \core\Core::getInstance()->app['theme'];
        $this->viewPath = "views/{$this->theme}/{$this->moduleName}/{$this->language}/{$this->actionName}.php";
    }

    public function render(string $viewPath = null, array $params = null): bool|string
    {
        if (empty($viewPath))
            $viewPath = $this->viewPath;

        $templateMaker = new TemplateMaker($viewPath);

        if (!empty($params)) {
            $templateMaker->setParams($params);
        }

        return $templateMaker->getHTML();
    }

    public function renderView(string $viewName, array $params = null): bool|string
    {
        $path = "views/{$this->theme}/{$this->moduleName}/{$this->language}/{$viewName}.php";

        $templateMaker = new TemplateMaker($path);

        if (!empty($params)) {
            $templateMaker->setParams($params);
        }

        return $templateMaker->getHTML();
    }

    #[NoReturn] public function redirect(string $url): void
    {
        header("Location: $url");
        die();
    }

    public function error(int $code, string $message = null): Error
    {
        return new Error($code, $message);
    }
}