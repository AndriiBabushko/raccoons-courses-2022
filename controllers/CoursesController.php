<?php

namespace controllers;

use core\Controller;

class CoursesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function viewAction(): bool|string
    {
        return $this->render();
    }

    public function adminPageAction(): bool|string
    {
        return $this->render();
    }
}