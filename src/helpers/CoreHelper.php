<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

abstract class CoreHelper
{
    public static function attributeLabels(): array
    {
        return [
            'id' => Yii::t('helpers', 'id'),
            'created_at' => Yii::t('helpers', 'ct.at'),
            'updated_at' => Yii::t('helpers', 'up.at'),
            'created_by' => Yii::t('helpers', 'ct.by'),
            'updated_by' => Yii::t('helpers', 'up.by'),
            'modifier' => Yii::t('helpers', 'mod'),
            'deleted' => Yii::t('helpers', 'deleted'),
            'is_published' => Yii::t('helpers', 'is published'),
            'is_archived' => Yii::t('helpers', 'is published'),
        ];
    }

    /**
     * @param string|ActiveRecord $entity
     * @param callable|null       $key
     * @param callable|null       $condition
     *
     * @return array
     */
    private static function baseEntityList(string $entity, callable $key = null, callable $condition = null): array
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
