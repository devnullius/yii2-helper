<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use yii\db\ActiveQueryInterface;

interface StandardQuery
{
    public function isPublished(string|null $alias = null, string $fieldName = 'published'): ActiveQueryInterface;

    public function isNotPublished(string|null $alias = null, string $fieldName = 'published'): ActiveQueryInterface;

    public function isActive(string|null $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDraft(string|null $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDeleted(string|null $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isNotDeleted(string|null $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isArchived(string|null $alias = null, string $fieldName = 'archived'): ActiveQueryInterface;

    public function isNotArchived(string|null $alias = null, string $fieldName = 'archived'): ActiveQueryInterface;

    public function isEnabled(string|null $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface;

    public function isDisabled(string|null $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface;

    public function isDefault(string|null $alias = null, string $fieldName = 'default'): ActiveQueryInterface;

    public function isNotDefault(string|null $alias = null, string $fieldName = 'default'): ActiveQueryInterface;
}
