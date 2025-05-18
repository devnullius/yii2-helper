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
    final public function isPublished(string|null $alias = null, string $fieldName = 'published'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_PUBLISHED,
        ]);
    }

    final public function isNotPublished(string|null $alias = null, string $fieldName = 'published'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_PUBLISHED,
        ]);
    }

    final public function isActive(string|null $alias = null, string $fieldName = 'status'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_ACTIVE,
        ]);
    }

    final public function isDraft(string|null $alias = null, string $fieldName = 'status'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DRAFT,
        ]);
    }

    final public function isDeleted(string|null $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DELETED,
        ]);
    }

    final public function isNotDeleted(string|null $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_DELETED,
        ]);
    }

    final public function isArchived(string|null $alias = null, string $fieldName = 'archived'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_ARCHIVED,
        ]);
    }

    final public function isNotArchived(string|null $alias = null, string $fieldName = 'archived'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_ARCHIVED,
        ]);
    }

    final public function isEnabled(string|null $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_ENABLED,
        ]);
    }

    final public function isDisabled(string|null $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DISABLED,
        ]);
    }

    final public function isDefault(string|null $alias = null, string $fieldName = 'default'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_DEFAULT,
        ]);
    }

    final public function isNotDefault(string|null $alias = null, string $fieldName = 'default'): ActiveQueryInterface
    {
        assert($this instanceof ActiveQuery);

        return $this->andWhere([
            ($alias ? $alias . '.' : '') . $fieldName => FlagHelper::IS_NOT_DEFAULT,
        ]);
    }
}
