<?php

namespace models;

use core\Core;
use core\Utils;

class User
{
    protected static string $tableName = 'User';

    public static function addUser(string $first_name, string $last_name, string $email, string $phone_number, string $password, string $bio = ""): bool
    {
        return \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'bio' => $bio,
                'password' => self::hashPassword($password)
            ]
        );
    }

    public static function updateUser(int $id_user, array $userUpdateData, string $imgPath = "", string $imgName = ""): bool
    {
        $userUpdateData = Utils::filterArray($userUpdateData, ['first_name', 'last_name', 'email', 'phone_number', 'bio', 'bought_goods']);

        $userPhotoName = self::getUserById($id_user)['avatar'];
        $userPhotoPath = "static/img/user/$userPhotoName";
        if(file_exists($userPhotoPath) && $userPhotoName !== "no_image.png")
            unlink($userPhotoPath);

        if(!file_exists("static/img/user/$imgName")) {
            $newImgPath = "static/img/user/$imgName";
            $userUpdateData += ['avatar' => $imgName];
            move_uploaded_file($imgPath, $newImgPath);
        }

        return Core::getInstance()->db->update(
            self::$tableName, $userUpdateData, [
                'id_user' => $id_user
            ]
        );
    }

    public static function deleteUser(int $id_user): bool
    {
        $avatarName = self::getUserById($id_user)['avatar'];
        $avatarPath = "static/img/category/$avatarName";

        if(file_exists($avatarPath))
            unlink($avatarPath);

        return Core::getInstance()->db->delete(self::$tableName, [
            'id_user' => $id_user
        ]);
    }

    public static function getBoughtGoodsByUserID($id_user): mixed
    {
        $cart = Core::getInstance()->db->select(self::$tableName, 'bought_goods', [
            'id_user' => $id_user
        ]);

        if (!empty($cart))
            return $cart[0]['bought_goods'];

        return null;
    }

    public static function isEmailExists(string $email): bool
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'email' => $email
        ]);

        return !empty($user);
    }

    public static function verifyUser(string $email, string $password): bool
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'email' => $email,
            'password' => $password
        ]);

        return !empty($user);
    }

    public static function getUserByEmailAndPassword(string $email, string $password): mixed
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'email' => $email,
            'password' => self::hashPassword($password)
        ]);

        if (!empty($user))
            return $user[0];

        return null;
    }

    public static function getUserById(int $id_user): mixed
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_user' => $id_user
        ]);

        if (!empty($user))
            return $user[0];

        return null;
    }

    public static function getUserByEmail(string $email): mixed
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'email' => $email
        ]);

        if (!empty($user))
            return $user[0];

        return null;
    }

    public static function authUser(array|bool $user): void
    {
        $_SESSION['user'] = $user;
    }

    public static function logoutUser(): void
    {
        unset($_SESSION['user']);
    }

    public static function isUserAuth(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function getCurrentAuthUser()
    {
        return $_SESSION['user'];
    }

    public static function isAdmin(): bool
    {
        if(self::isUserAuth())
            return self::getCurrentAuthUser()['is_admin'] === 1;

        return false;
    }

    public static function hashPassword(string $password): string
    {
        return md5($password);
    }
}