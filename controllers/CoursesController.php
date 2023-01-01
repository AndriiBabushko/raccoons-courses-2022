<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Error;
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

    public function addAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        if (Core::getInstance()->requestMethod === 'POST') {
            $model = $_POST;

            $errors = [];

            if (Good::verifyGoodByName($model['name'])) {
                $addGoodStatus = Good::addGood($model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                if ($addGoodStatus)
                    $this->redirect("/courses/$this->language/index");

                $errors += Utils::generateError('somethingWrong', [
                    'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                    'eng' => 'Something went wrong! Try again!'
                ]);
            }

            $errors += Utils::generateError('name', [
                'ukr' => 'Введена назва категорії вже існує!',
                'eng' => 'The entered category name already exists!'
            ]);

            return $this->render(null, [
                'model' => $model,
                'errors' => $errors
            ]);
        }

        return $this->render();
    }

    public function updateAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        return $this->render();
    }

    public function deleteAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        return $this->render();
    }
}