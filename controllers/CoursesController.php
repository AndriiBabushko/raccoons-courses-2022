<?php

namespace controllers;

use core\Controller;
use models\Good;
use models\User;

class CoursesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        $goods = Good::getGoods();
        return $this->render(null, [
            'goods' => $goods
        ]);
    }

    public function cartAction(): bool|string
    {
        return $this->render();
    }

    public function addAction(): \models\Error|bool|string
    {
        if(!User::isAdmin())
            return $this->error(403);

        return $this->render();
    }

    public function updateAction(): \models\Error|bool|string
    {
        if(!User::isAdmin())
            return $this->error(403);

        return $this->render();
    }

    public function deleteAction(): \models\Error|bool|string
    {
        if(!User::isAdmin())
            return $this->error(403);

        return $this->render();
    }
}