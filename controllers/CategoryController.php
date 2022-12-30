<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Category;
use models\Error;
use models\User;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): Error|bool|string
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

            if (Category::verifyCategoryByName($model['name'])) {
                $addCategoryStatus = Category::addCategory($model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                if ($addCategoryStatus)
                    $this->redirect("/category/$this->language/index");

                if (Utils::ifLanguageEqual('ukr'))
                    $errors['somethingWrong'] = 'Щось пішло не так! Спробуйте ще раз!';
                if (Utils::ifLanguageEqual('eng'))
                    $errors['somethingWrong'] = 'Something went wrong! Try again!';
            }

            if (Utils::ifLanguageEqual('ukr'))
                $errors['name'] = 'Введена назва категорії вже існує!';
            if (Utils::ifLanguageEqual('eng'))
                $errors['name']  = 'The entered category name already exists!';

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

        if (Core::getInstance()->requestMethod === 'POST') {
            $id_category = $_GET['id_category'];
            $model = $_POST;

            $updateCategoryStatus = Category::updateCategory($id_category, $model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

            if ($updateCategoryStatus)
                return $this->renderView('updateCategoryStatus', [
                    'updateStatus' => true
                ]);

            return $this->renderView('updateCategoryStatus', [
                'updateStatus' => false
            ]);
        }

        return $this->render();
    }

    public function deleteAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        if (Core::getInstance()->requestMethod === 'POST') {
            $id_category = $_GET['id_category'];

            $deleteCategoryStatus = Category::deleteCategory($id_category);

            if ($deleteCategoryStatus)
                return $this->renderView('deleteCategoryStatus', [
                    'deleteStatus' => true
                ]);

            return $this->renderView('deleteCategoryStatus', [
                'deleteStatus' => false
            ]);
        }

        return $this->render();
    }
}