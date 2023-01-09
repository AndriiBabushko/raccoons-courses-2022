<?php

namespace models;

use core\Core;

class Video
{
    protected static string $tableName = "Video";

    public static function addVideo(array $tableFields, string $videoPath): bool
    {
        $goodName = Good::getGoodById($tableFields['id_good'])['name'];
        $dirPath = "static/videos/$goodName";
        if (!is_dir($dirPath)) {
            mkdir($dirPath);
        }

        $tableFields = self::moveVideoToFolder($dirPath, $videoPath, $tableFields);

        return Core::getInstance()->db->insert(self::$tableName, $tableFields);
    }

    public static function updateVideoByVideoId(int $id_video, array $tableFields, string $videoPath = ""): bool
    {
        if (isset($tableFields['id_good'])) {
            $currentVideoPath = self::getVideoByVideoId($id_video)['video_path'];
            if (file_exists($currentVideoPath))
                unlink($currentVideoPath);

            $goodName = Good::getGoodById($tableFields['id_good'])['name'];
            $dirPath = "static/videos/$goodName";
            $tableFields = self::moveVideoToFolder($dirPath, $videoPath, $tableFields);
        }

        return Core::getInstance()->db->update(self::$tableName, $tableFields, [
            'id_video' => $id_video
        ]);
    }

    public static function updateVideoByGoodId(int $id_good, array $tableFields): bool
    {
        return Core::getInstance()->db->update(self::$tableName, $tableFields, [
            'id_good' => $id_good
        ]);
    }

    public static function turnOfVisibleVideoByGoodId(int $id_good): bool
    {
        return Core::getInstance()->db->update(self::$tableName, ['is_visible' => 0], [
            'id_good' => $id_good,
            'is_visible' => 1
        ]);
    }

    public static function deleteVideoByVideoId(int $id_video): bool
    {
        $currentVideoPath = self::getVideoByVideoId($id_video)['video_path'];
        if (file_exists($currentVideoPath))
            unlink($currentVideoPath);

        return Core::getInstance()->db->delete(self::$tableName, [
            'id_video' => $id_video
        ]);
    }

    public static function getVideos(): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName);
    }

    public static function getVideoByVideoId(int $id_video): mixed
    {
        $video = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_video' => $id_video
        ]);

        if (!empty($video))
            return $video[0];

        return null;
    }

    public static function getVideosByGoodId(int $id_good): bool|array
    {
        return Core::getInstance()->db->select(self::$tableName, '*', [
            'id_good' => $id_good
        ]);
    }

    public static function getVisibleVideoByGoodId(int $id_good): mixed
    {
        $video = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_good' => $id_good,
            'is_visible' => 1
        ]);

        if (!empty($video))
            return $video[0];

        return null;
    }

    private static function moveVideoToFolder(string $dirPath, string $videoPath, array $tableFields): array
    {
        $i = 1;
        while (true) {
            $videoName = "$i.mp4";
            if (!file_exists("$dirPath/$videoName")) {
                $newVideoPath = "$dirPath/$videoName";
                $tableFields += ['video_path' => $newVideoPath];
                move_uploaded_file($videoPath, $newVideoPath);
                return $tableFields;
            }
            $i++;
        }
    }
}