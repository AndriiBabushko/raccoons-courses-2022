<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Category;
use models\Error;
use models\Good;
use models\User;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): Error|bool|string
    {
        $categories = Category::getCategories();

        return $this->render(null, [
            'categories' => $categories
        ]);
    }

    public function addAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        if (Core::getInstance()->requestMethod === 'POST') {
            $model = $_POST;
            $errors = [];

            if (Utils::checkImgExtension($_FILES['photo']['name'])) {
                if (Category::verifyCategoryByName($model['name'])) {
                    $addCategoryStatus = Category::addCategory($model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                    if ($addCategoryStatus)
                        $this->redirect("/category/$this->language/index");

                    $errors += Utils::generateMessage('somethingWrong', [
                        'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                        'eng' => 'Something went wrong! Try again!'
                    ]);
                } else {
                    $errors += Utils::generateMessage('name', [
                        'ukr' => 'Введена назва категорії вже існує!',
                        'eng' => 'The entered category name already exists!'
                    ]);

                }
            } else {
                $errors += Utils::generateMessage('photo', [
                    'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка фотографію.',
                    'eng' => 'File extension is wrong! Please download the photo.'
                ]);
            }

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

            if (empty($_FILES['photo']['name']) || Utils::checkImgExtension($_FILES['photo']['name'])) {
                $updateCategoryStatus = Category::updateCategory($id_category, $model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);

                if ($updateCategoryStatus)
                    return $this->renderView('updateCategoryStatus', [
                        'updateStatus' => true
                    ]);
            }

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