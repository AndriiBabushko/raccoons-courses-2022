<?php

namespace models;

use core\Core;

class Category
{
    protected static string $tableName = "Category";

    public static function addCategory(array $tableFields, string $imgPath, string $imgName): bool
    {
        if (!file_exists("static/img/category/$imgName")) {
            $newImgPath = "static/img/category/$imgName";
            $tableFields += ['photo' => $imgName];
            move_uploaded_file($imgPath, $newImgPath);
        }

        return Core::getInstance()->db->insert(self::$tableName, $tableFields);
    }

    public static function updateCategory(int $id_category, array $updateCategoryData, string $imgPath, string $imgName): bool
    {
        $categoryPhotoName = self::getCategoryById($id_category)['photo'];
        $photoPath = "static/img/category/$categoryPhotoName";
        if (file_exists($photoPath) && $categoryPhotoName !== "no_image.png")
            unlink($photoPath);

        if (!file_exists("static/img/category/$imgName")) {
            $newImgPath = "static/img/category/$imgName";
            $updateCategoryData += ['photo' => $imgName];
            move_uploaded_file($imgPath, $newImgPath);
        }

        return Core::getInstance()->db->update(self::$tableName, $updateCategoryData, [
            'id_category' => $id_category
        ]);
    }

    public static function deleteCategory(int $id_category): bool
    {
        $imgName = self::getCategoryById($id_category)['photo'];
        $imgPath = "static/img/category/$imgName";

        if(file_exists($imgPath))
            unlink($imgPath);

        return Core::getInstance()->db->delete(self::$tableName, [
            'id_category' => $id_category
        ]);
    }

    public static function getCategoryById(int $id_category): mixed
    {
        $category = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_category' => $id_category
        ]);

        if (!empty($category))
            return $category[0];

        return null;
    }

    public static function getCategories(): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName);
    }

    public static function verifyCategoryByName(string $name): bool
    {
        $category = Core::getInstance()->db->select(self::$tableName, '*', [
            'name' => $name
        ]);

        return empty($category);
    }
}