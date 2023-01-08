<?php

namespace models;

use core\Core;

class Good
{
    protected static string $tableName = "Good";

    public static function addGood(array $addData, string $imgPath = "", string $imgName = ""): bool
    {
        if (!file_exists("static/img/courses/$imgName")) {
            $newImgPath = "static/img/courses/$imgName";
            $addData += ['photo' => $imgName];
            move_uploaded_file($imgPath, $newImgPath);
        }

        return Core::getInstance()->db->insert(self::$tableName, $addData);
    }

    public static function updateGood(int $id_good, array $updateData, string $imgPath = "", string $imgName = ""): bool
    {
        $goodPhotoName = self::getGoodById($id_good)['photo'];
        $photoPath = "static/img/courses/$goodPhotoName";
        if (file_exists($photoPath) && $goodPhotoName !== "no_image.png")
            unlink($photoPath);

        if (!file_exists("static/img/category/$imgName")) {
            $newImgPath = "static/img/courses/$imgName";
            $updateData += ['photo' => $imgName];
            move_uploaded_file($imgPath, $newImgPath);
        }

        return Core::getInstance()->db->update(self::$tableName, $updateData, [
            'id_good' => $id_good
        ]);
    }

    public static function deleteGood(int $id_good): bool
    {
        $imgName = self::getGoodById($id_good)['photo'];
        $imgPath = "static/img/category/$imgName";

        if (file_exists($imgPath))
            unlink($imgPath);

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

    public static function getGoodByUserId(int $id_user): mixed
    {
        $good = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_user' => $id_user
        ]);

        if (!empty($good))
            return $good[0];

        return null;
    }

    public static function getGoodsByCategoryId(int $id_category): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName, '*', [
            'id_category' => $id_category
        ]);
    }

    public static function getGoods(): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName);
    }

    public static function verifyGoodByName($name): bool
    {
        $good = Core::getInstance()->db->select(self::$tableName, '*', [
            'name' => $name
        ]);

        return empty($good);
    }
}