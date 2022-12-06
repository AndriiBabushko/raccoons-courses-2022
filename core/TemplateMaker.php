<?php

namespace core;

class TemplateMaker
{
    protected string $path;
    protected array $params;

    public function __construct($path)
    {
        $this->path = $path;
        $this->params = [];
    }

    public function setParam($variableName, $variableValue): void
    {
        $this->params[$variableName] = $variableValue;
    }

    public function setParams($params): void
    {
        foreach ($params as $name => $value){
            $this->setParam($name, $value);
        }
    }

    public function getHTML(): bool|string
    {
        ob_start();

        extract($this->params);
        include($this->path);
        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }
}