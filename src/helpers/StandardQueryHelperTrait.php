<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

trait StandardQueryHelperTrait
{
    public static function genTableField(string $fieldName, bool $withQuoting = true): string
    {
        $tableName = self::tableName();
        if (!$withQuoting) {
            $tableName = substr($tableName, 3);
            $tableName = substr($tableName, 0, -2);
        }

        if (!empty($fieldName)) {
            if ($withQuoting) {
                $fieldName = '.[[' . $fieldName . ']]';
            }
        }

        return $tableName . $fieldName;
    }
}
