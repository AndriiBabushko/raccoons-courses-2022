<?php

namespace core;

class Utils
{
    public static function filterArray($array, $fieldList): array
    {
        $newArray = [];
        foreach ($array as $key => $value){
            if(in_array($key, $fieldList))
                $newArray [$key] = $value;
        }

        return $newArray;
    }

    public static function ifLanguageEqual($language): bool
    {
        return \core\Core::getInstance()->app['language'] === $language;
    }
}