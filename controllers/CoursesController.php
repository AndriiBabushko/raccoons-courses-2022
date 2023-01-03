<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Category;
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

    public function viewAction(array $params): bool|string
    {
        $id_category = $params[0];
        var_dump($id_category);

        if (is_numeric($id_category)) {

        } else {

        }

        return $this->render();
    }

    public function addAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $categories = Category::getCategories();

        if (Core::getInstance()->requestMethod === 'POST') {
            $model = $_POST;
            $errors = [];

            if (Utils::checkImgExtension($_FILES['photo']['name'])) {
                if (Good::verifyGoodByName($model['name'])) {
                    $addGoodStatus = Good::addGood($model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                    if ($addGoodStatus)
                        $this->redirect("/courses/$this->language/index");

                    $errors += Utils::generateError('somethingWrong', [
                        'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                        'eng' => 'Something went wrong! Try again!'
                    ]);
                } else {
                    $errors += Utils::generateError('name', [
                        'ukr' => 'Введена назва продукту(курсу) вже існує!',
                        'eng' => 'The entered good name already exists!'
                    ]);
                }
            } else {
                $errors += Utils::generateError('photo', [
                    'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка фотографію.',
                    'eng' => 'File extension is wrong! Please download the photo.'
                ]);
            }

            return $this->render(null, [
                'model' => $model,
                'categories' => $categories,
                'errors' => $errors
            ]);
        }

        return $this->render(null, [
            'categories' => $categories
        ]);
    }

    public function updateAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $id_good = $_GET['id_good'];
        $good = Good::getGoodById(intval($id_good));
        $categories = Category::getCategories();
        $errors = [];
        $model = $_POST;

        if ($good && $categories) {
            if (Core::getInstance()->requestMethod === 'POST') {
                if (empty($_FILES['photo']['name']) || Utils::checkImgExtension($_FILES['photo']['name'])) {
                    $updateGoodStatus = Good::updateGood($id_good, $model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                    if ($updateGoodStatus)
                        return $this->renderView('updateGoodStatus', [
                            'updateStatus' => true
                        ]);

                    return $this->renderView('updateGoodStatus', [
                        'updateStatus' => false
                    ]);
                } else {
                    $errors += Utils::generateError('photo', [
                        'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка фотографію.',
                        'eng' => 'File extension is wrong! Please download the photo.'
                    ]);
                }
            }

            return $this->render(null, [
                'model' => $model,
                'good' => $good,
                'categories' => $categories,
                'errors' => $errors
            ]);
        } else {
            $errors += Utils::generateError('somethingWrong', [
                'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                'eng' => 'Something went wrong! Try again!'
            ]);
        }

        return $this->render(null, [
            'errors' => $errors
        ]);
    }

    public function deleteAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        if (Core::getInstance()->requestMethod === 'POST') {
            $id_good = $_GET['id_good'];
            $deleteGoodStatus = Good::deleteGood($id_good);

            if ($deleteGoodStatus)
                return $this->renderView('deleteGoodStatus', [
                    'deleteStatus' => true
                ]);

            return $this->renderView('deleteGoodStatus', [
                'deleteStatus' => false
            ]);
        }

        return $this->render();
    }
}