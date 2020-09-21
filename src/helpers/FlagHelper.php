<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class FlagHelper
{
    public const IS_DRAFT = 10;
    public const IS_ACTIVE = 20;
    public const IS_PUBLISHED = true;
    public const IS_NOT_PUBLISHED = false;
    public const IS_DELETED = true;
    public const IS_NOT_DELETED = false;
    public const IS_ARCHIVED = true;
    public const IS_NOT_ARCHIVED = false;
    public const IS_DEFAULT = true;
    public const IS_NOT_DEFAULT = false;
    public const IS_ENABLED = true;
    public const IS_DISABLED = false;
    public static string $translateCategory = 'helpers';

    public static function statusName(int $status): string
    {
        try {
            return ArrayHelper::getValue(self::statusList(), $status);
        } catch (Exception $e) {
            Yii::$app->errorHandler->logException($e);

            return $e->getMessage();
        }
    }

    public static function statusList(): array
    {
        return [
            self::IS_DRAFT => Yii::t(static::$translateCategory, 'draft'),
            self::IS_ACTIVE => Yii::t(static::$translateCategory, 'active'),
        ];
    }

    public static function statusLabel(int $status): string
    {
        switch ($status) {
            case self::IS_DRAFT:
                $class = 'label label-default';
                break;
            case self::IS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        try {
            return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
                'class' => $class,
            ]);
        } catch (Exception $e) {
            Yii::$app->errorHandler->logException($e);

            return $e->getMessage();
        }
    }

    public static function isPublishedList(): array
    {
        return [
            self::IS_PUBLISHED => Yii::t(static::$translateCategory, 'published'),
            self::IS_NOT_PUBLISHED => Yii::t(static::$translateCategory, 'not published'),
        ];
    }

    public static function isArchivedList(): array
    {
        return [
            self::IS_ARCHIVED => Yii::t(static::$translateCategory, 'archived'),
            self::IS_NOT_ARCHIVED => Yii::t(static::$translateCategory, 'not archived'),
        ];
    }

    public static function isDeletedList(): array
    {
        return [
            self::IS_DELETED => Yii::t(static::$translateCategory, 'deleted'),
            self::IS_NOT_DELETED => Yii::t(static::$translateCategory, 'not deleted'),
        ];
    }

    public static function isEnabledList(): array
    {
        return [
            self::IS_ENABLED => Yii::t(static::$translateCategory, 'enabled'),
            self::IS_DISABLED => Yii::t(static::$translateCategory, 'disabled'),
        ];
    }

    public static function isDefaultList(): array
    {
        return [
            self::IS_DEFAULT => Yii::t(static::$translateCategory, 'default'),
            self::IS_NOT_DEFAULT => Yii::t(static::$translateCategory, 'not default'),
        ];
    }
}
