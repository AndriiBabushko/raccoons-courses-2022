<?php

namespace controllers;

use core\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        return $this->render();
    }
}