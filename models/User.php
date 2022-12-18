<?php

namespace models;

use core\Core;
use core\Utils;

class User
{
    protected static string $tableName = 'User';

    public static function addUser(string $first_name, string $last_name, string $email, string $phone_number, string $bio, string $password, int $is_admin): void
    {
        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'bio' => $bio,
                'password' => $password,
                'is_admin' => $is_admin
            ]
        );
    }

    public static function updateUser(int $id_user, array $userUpdateData): void
    {
        $userUpdateData = Utils::filterArray($userUpdateData, ['first_name', 'last_name', 'email', 'phone_number', 'bio']);
        \core\Core::getInstance()->db->update(
            self::$tableName, $userUpdateData, [
                'id_user' => $id_user
            ]
        );
    }

    public static function deleteUser(): void
    {

    }

    public static function isEmailExists(string $email): bool
    {
        $user = Core::getInstance()->db->select(self::$tableName, '*', [
            'email' => $email
        ]);

        return !empty($user);
    }
}