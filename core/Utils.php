<?php

namespace core;

class Utils
{
    public static function filterArray(array $array, array $fieldList): array
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            if (in_array($key, $fieldList))
                $newArray [$key] = $value;
        }

        return $newArray;
    }

    public static function ifLanguageEqual(string $language): bool
    {
        return \core\Core::getInstance()->app['language'] === $language;
    }

    public static function generateMessage(string $messageName, array $messagesTextList): array
    {
        $errors = [];

        foreach ($messagesTextList as $key => $value)
            if (Utils::ifLanguageEqual($key))
                $errors[$messageName] = $value;

        return $errors;
    }

    public static function checkImgExtension(string $imgName) {
        $explodeArray = explode('.', $imgName);
        $extension = end($explodeArray);
        if ($extension === 'png' || $extension === 'jpg')
            return true;

        return false;
    }
}