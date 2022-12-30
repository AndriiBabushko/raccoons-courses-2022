<?php

namespace controllers;

use core\Controller;
use core\Core;
use JetBrains\PhpStorm\NoReturn;
use models\User;

class SiteController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        return $this->render();
    }

    public function errorAction($code): bool|string
    {
        switch ($code) {
            case 403:
                return $this->render(null, ['error_message' => 'Error 403. Access denied!']);
            case 404:
                return $this->render(null, ['error_message' => 'Error 404. Page not found!']);
            default:
                return $this->render(null, ['error_message' => 'Something went wrong!']);
        }
    }
}