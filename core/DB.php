<?php

namespace core;

class DB
{
    protected \PDO $pdo;

    public function __construct(string $hostName, string $login, string $password, string $database)
    {
        $this->pdo = new \PDO("mysql: host={$hostName}; dbname={$database}", $login, $password);
    }

    /**
     * Method to INSERT one row data into DB
     * @param string $tableName The name of the table
     * @param array $newRow Association array with keys and values to INSERT
     * @return bool Return TRUE if INSERT is successful, otherwise FALSE
     */
    public function insert(string $tableName, array $newRow): bool
    {
        $fieldsParamsArray = array_keys($newRow);
        $fieldsParamsString = implode(', ', $fieldsParamsArray);

        $newValuesArray = [];
        foreach ($newRow as $key => $value) {
            $newValuesArray [] = ":" . $key;
        }
        $newValuesString = implode(', ', $newValuesArray);

        $res = $this->pdo->prepare("INSERT INTO {$tableName} ({$fieldsParamsString}) VALUES ({$newValuesString})");
        echo "<pre>";
        var_dump($res);
        return $res->execute($newRow);
    }

    /**
     * Method to READ and GET data from DB
     * @param string $tableName The name of the table
     * @param string|array $fieldsArray The association array of named fields of table to SELECT
     * @param array|null $conditionArray The association array with keys and values to build WHERE close
     * @return bool|array Return all found rows in the table if successful, otherwise FALSE
     */
    public function select(string $tableName, string|array $fieldsArray = "*", array|null $conditionArray = null): bool|array
    {
        if (is_string($fieldsArray))
            $fieldsListString = $fieldsArray;

        if (is_array($fieldsArray))
            $fieldsListString = implode(', ', $fieldsArray);

        $whereCloseString = "";
        if (is_array($conditionArray)) {
            $whereCloseString = self::generateWhereClose($conditionArray);
        }

        $result = $this->pdo->prepare("SELECT {$fieldsListString} FROM {$tableName} {$whereCloseString}");
        $result->execute($conditionArray);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Method to UPDATE data in certain table
     * @param string $tableName The name of the table
     * @param array $newValuesArray The association array with keys and values to UPDATE
     * @param array $conditionArray The association array with keys and values to build WHERE close
     * @return bool Return TRUE if successful, otherwise FALSE
     */
    public function update(string $tableName, array $newValuesArray, array $conditionArray): bool
    {
        $paramsArray = [];
        $setCloses = [];
        foreach ($newValuesArray as $key => $value) {
            $setCloses[] = "{$key} = :set{$key}";
            $paramsArray ["set" . $key] = $value;
        }

        $setCloseString = "SET " . implode(', ', $setCloses);

        foreach ($conditionArray as $key => $value)
            $paramsArray [$key] = $value;

        $whereCloseString = self::generateWhereClose($conditionArray);

        $result = $this->pdo->prepare("UPDATE {$tableName} {$setCloseString} {$whereCloseString}");
        return $result->execute($paramsArray);
    }

    /**
     * Method to DELETE data from certain table by some values
     * @param string $tableName The name of the table
     * @param array $conditionArray The association array with keys and values to build WHERE close
     * @return bool Return TRUE if successful, otherwise FALSE
     */
    public function delete(string $tableName, array $conditionArray): bool
    {
        $whereCloseString = self::generateWhereClose($conditionArray);

        $result = $this->pdo->prepare("DELETE FROM {$tableName} {$whereCloseString}");
        return $result->execute($conditionArray);
    }

    /**
     * @param array $conditionArray The association array with keys and values to build WHERE close
     * @return string Return built WHERE close for DB queries
     */
    protected function generateWhereClose(array $conditionArray): string
    {
        $whereCloses = [];

        foreach ($conditionArray as $key => $value) {
            $whereCloses [] = "{$key} = :{$key}";
        }

        return "WHERE " . implode(' AND ', $whereCloses);
    }
}