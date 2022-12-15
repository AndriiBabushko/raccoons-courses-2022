<?php

namespace controllers;

use core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        return $this->render();
    }

    public function formAction(): bool|string
    {
        return $this->render();
    }

    public function loginAction(): bool|string
    {
        return $this->render();
    }

    public function registerAction(): bool|string
    {
        return $this->render();
    }
}