<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        if(isset($_GET['language']))
            $this->redirect("/settings/" . $_GET['language'] ."/index");

        if (Core::getInstance()->requestMethod === 'POST') {
            $currentUser = User::getCurrentAuthUser();
            $model = $_POST;

            if(!User::isUserExistWithEmail($_POST['email']) || $currentUser['email'] == $_POST['email']) {
                $id_user = $currentUser['id_user'];

                if (empty($_FILES['avatar']['name']) && empty($_FILES['avatar']['tmp_name'])) {
                    $updateStatus = User::updateUser($id_user, $model);
                } else {
                    if (Utils::checkImgExtension($_FILES['avatar']['name'])) {
                        $updateStatus = User::updateUser($id_user, $model, $_FILES['avatar']['tmp_name'], $_FILES['avatar']['name']);
                    }
                }

                if (!empty($updateStatus) && $updateStatus) {
                    $user = User::getUserById($id_user);
                    User::authUser($user);

                    return $this->renderView('updateUserStatus', [
                        'updateStatus' => true
                    ]);
                }
            }

            return $this->renderView('updateUserStatus', [
                'updateStatus' => false
            ]);
        }

        return $this->render(null, [
            'language' => $this->language,
            'theme' => $this->theme
        ]);
    }

    public function deleteUserAction(): bool|string
    {
        if (User::isUserAuth()) {
            $deleteStatus = User::deleteUser(User::getCurrentAuthUser()['id_user']);

            if ($deleteStatus) {
                User::logoutUser();

                return $this->renderView("deleteUserStatus", [
                    'deleteStatus' => true
                ]);
            }

            return $this->renderView("deleteUserStatus", [
                'deleteStatus' => false
            ]);
        }

        return $this->renderView("index");
    }
}