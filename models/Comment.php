<?php

namespace models;

use core\Core;

class Comment
{
    protected static string $tableName = "Comment";

    public static function addComment(array $tableFields): bool
    {
        return Core::getInstance()->db->insert(self::$tableName, $tableFields);
    }

    public static function updateCommentByGoodId(int $id_good, array $tableFields): bool
    {
        return Core::getInstance()->db->update(self::$tableName, $tableFields, [
            'id_good' => $id_good
        ]);
    }

    public static function updateCommentByCommentId(int $id_comment, array $tableFields): bool
    {
        return Core::getInstance()->db->update(self::$tableName, $tableFields, [
            'id_comment' => $id_comment
        ]);
    }

    public static function deleteCommentByGoodId(int $id_good): bool
    {
        return Core::getInstance()->db->delete(self::$tableName, [
            'id_good' => $id_good
        ]);
    }

    public static function deleteCommentByCommentId(int $id_comment): bool
    {
        return Core::getInstance()->db->delete(self::$tableName, [
            'id_comment' => $id_comment
        ]);
    }

    public static function getComments(): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName);
    }

    public static function getCommentsByGoodId(int $id_good): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName, '*', [
            'id_good' => $id_good
        ]);
    }

    public static function isCommentExist(string $comment): bool
    {
        $comment =  Core::getInstance()->db->select(self::$tableName, '*', [
            'comment' => $comment
        ]);

        if(empty($comment))
            return false;

        return true;
    }
}