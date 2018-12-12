<?php

namespace app\models;

class Type extends BaseModel
{
    public static function getTableName(): string
    {
        return 'type';
    }

    public function getArrayDataForTable(string $column, $table = ''): array {
        return parent::getArrayDataForTable($column, self::getTableName());
    }
}