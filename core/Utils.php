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

    public static function generateError(string $errorName, array $errorsTextList): array
    {
        $errors = [];

        foreach ($errorsTextList as $key => $value)
            if (Utils::ifLanguageEqual($key))
                $errors[$errorName] = $value;

        return $errors;
    }
}