<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

abstract class CoreHelper
{
    public static function attributeLabels(callable|null $translateFunction = null): array
    {
        if ($translateFunction === null) {
            $translateFunction = static function (string $category, string $message, array $params = [], string|null $language = null) {
                return Yii::t($category, $message, $params, $language);
            };
        }

        return [
            'id' => $translateFunction('helpers', 'id'),
            'created_at' => $translateFunction('helpers', 'ct.at'),
            'updated_at' => $translateFunction('helpers', 'up.at'),
            'created_by' => $translateFunction('helpers', 'ct.by'),
            'updated_by' => $translateFunction('helpers', 'up.by'),
            'modifier' => $translateFunction('helpers', 'mod'),
            'deleted' => $translateFunction('helpers', 'deleted'),
            'archived' => $translateFunction('helpers', 'archived'),
            'is_published' => $translateFunction('helpers', 'is published'),
            'is_enabled' => $translateFunction('helpers', 'is enabled'),
        ];
    }

    /**
     * @param string        $entity
     * @param callable|null $key
     * @param callable|null $condition
     *
     * @return array
     */
    protected static function baseEntityList(string $entity, callable|null $key = null, callable|null $condition = null): array
    {
        assert($entity instanceof ActiveRecord);
        $key = $key ?? static function ($entity) {
                return $entity['title'];
        };
        $query = $entity::find();
        $condition = $condition ?? static function (ActiveQuery $query) {
                return $query;
        };
        $result = static function (ActiveQuery $query) use ($condition) {
            return $condition($query);
        };

        return ArrayHelper::map($result($query)->asArray()->all(), 'id', static function (array $entity) use ($key) {
            return $key($entity);
        });
    }
}
