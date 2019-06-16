<?php

namespace app\models;

use app\components\DBConnection;
use app\components\validators\Validator;
use PDO;

abstract class BaseModel
{

    protected $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getConnection();
    }

    public function getModelFields()
    {
        $ref = new \ReflectionObject($this);
        return array_column($ref->getProperties(\ReflectionProperty::IS_PUBLIC), 'name');
    }

    abstract public static function getTableName(): string;


    public function findById(int $id): array
    {
        $tableName = $this->getTableName();
        return $this->select('SELECT * FROM ' . $tableName . ' WHERE id = ' . $id . ' LIMIT 1');
    }

    public function create(array $attributes)
    {
        $tableName = $this->getTableName();

        $columns = array_map(function ($value) {
            return $value;
        }, array_keys($attributes));

        $values = array_map(function ($value) {
            return "'" . $value . "'";
        }, $attributes);

        $columns = implode(',', $columns);
        $values = implode(',', $values);
        echo 'INSERT INTO ' . $tableName . '(' . $columns . ') VALUES (' . $values . ');';
        $this->connection->prepare(
            'INSERT INTO ' . $tableName . '(' . $columns . ') VALUES (' . $values . ')'
        )->execute();
    }

    public function delete(int $id)
    {
        $tableName = $this->getTableName();
        $this->connection->prepare('DELETE FROM ' . $tableName . ' WHERE id=' . $id)->execute();
    }

    public function update(int $id, array $sets)
    {
        $tableName = $this->getTableName();

        $set = array_map(function ($key, $value) {
            return $key . "='" . $value . "'";
        }, array_keys($sets), array_values($sets));

        $set = implode(',', $set);

        return $this->connection->prepare('UPDATE ' . $tableName . ' SET ' . $set . ' WHERE id=' . $id)->execute();
    }

    public function searchName(string $name): array
    {
        $tableName = $this->getTableName();
        return $this->select('SELECT * FROM ' . $tableName . ' WHERE (name LIKE "*' . $name . '*"');
    }

    public function select(string $sql): array
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArrayDataForTable(string $column, $tableName): array {
        $tableData = $this->select('SELECT * FROM `' . $tableName . '`');
        $data = [];
        foreach ($tableData as $element) {
            $data[$element['id']] = $element[$column];
        }
        return $data;
    }
}
