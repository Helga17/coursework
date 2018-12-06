<?php

namespace app\models;

class Condition extends BaseModel
{
    public static function getTableName(): string {
        return 'condition';
    }

    public function getArrayDataForTable(string $column, $table = ''): array {
        return parent::getArrayDataForTable($column, self::getTableName());
    }
}