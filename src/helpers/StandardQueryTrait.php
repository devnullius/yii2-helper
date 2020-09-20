<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use yii\db\ActiveQuery;
use yii\db\ActiveQueryInterface;
use function assert;

/**
 * Trait StandardQueryTrait
 *
 * @package devnullius\helper\helpers
 */
trait StandardQueryTrait
{
    final public function isPublished(string $alias = null, string $fieldName = 'is_published'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_PUBLISHED,
        ]);
    }

    final public function isNotPublished(string $alias = null, string $fieldName = 'is_published'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_PUBLISHED,
        ]);
    }

    final public function isActive(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_ACTIVE,
        ]);
    }

    final public function isDraft(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DRAFT,
        ]);
    }

    final public function isDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DELETED,
        ]);
    }

    final public function isNotDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_DELETED,
        ]);
    }

    final public function isArchived(string $alias = null, string $fieldName = 'is_archived'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_ARCHIVED,
        ]);
    }

    final public function isNotArchived(string $alias = null, string $fieldName = 'is_archived'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_ARCHIVED,
        ]);
    }
}
