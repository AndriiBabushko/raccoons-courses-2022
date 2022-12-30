<?php

namespace models;

use core\Core;

class Good
{
    protected static string $tableName = "Good";

    public static function addGood(array $addData): bool
    {
        return Core::getInstance()->db->insert(self::$tableName, $addData);
    }

    public static function updateGood(int $id_good, array $updateData): bool
    {
        return Core::getInstance()->db->update(self::$tableName, $updateData, [
            'id_good' => $id_good
        ]);
    }
    public static function deleteGood(int $id_good): bool
    {
        return Core::getInstance()->db->delete(self::$tableName, [
            'id_good' => $id_good
        ]);
    }

    public static function getGoodById(int $id_good): mixed
    {
        $good = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_good' => $id_good
        ]);

        if (!empty($good))
            return $good[0];

        return null;
    }

    public static function getGoods(): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName);
    }
}