<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use JetBrains\PhpStorm\NoReturn;
use models\Cart;
use models\User;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loginAction(): bool|string
    {
        if (User::isUserAuth()) {
            $this->redirect('/');
        }

        if (Core::getInstance()->requestMethod === 'POST') {
            $user = User::getUserByEmailAndPassword($_POST['email'], $_POST['password']);

            if (empty($user)) {
                $error = null;

                if (Utils::ifLanguageEqual('ukr'))
                    $error = 'Логін та пароль неправильні або не існують!';

                if (Utils::ifLanguageEqual('eng'))
                    $error = 'Login and password are incorrect or do not exist!';

                $model = $_POST;
                return $this->render(null, [
                    'error' => $error,
                    'model' => $model
                ]);
            } else {
                User::authUser($user);
                Cart::updateCartByUserID($user['id_user'], ['goods' => serialize([])]);

                $this->redirect('/');
            }
        }

        return $this->render();
    }

    public function registerAction(): bool|string
    {
        if (User::isUserAuth()) {
            $this->redirect('/');
        }

        if (Core::getInstance()->requestMethod === 'POST') {
            $errors = [];
            // echo "<pre>" . var_dump($_POST) . "</pre>";
            if (User::isEmailExists($_POST['email'])) {
                if (Utils::ifLanguageEqual('ukr'))
                    $errors['email'] = 'Дана електронна пошта вже зайнята.';

                if (Utils::ifLanguageEqual('eng'))
                    $errors['email'] = 'This email address is already used.';
            }

            if (count($errors) > 0) {
                $model = $_POST;

                return $this->render(null, [
                    'errors' => $errors,
                    'model' => $model
                ]);
            } else {
                User::addUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['password']);
                Cart::addCart(['id_user' => User::getUserByEmail($_POST['email'])['id_user']]);

                return $this->renderView("registerStatus");
            }
        }

        return $this->render();
    }

    #[NoReturn] public function logoutAction()
    {
        User::logoutUser();
        $this->redirect('/');
    }
}