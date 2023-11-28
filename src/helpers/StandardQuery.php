<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use yii\db\ActiveQueryInterface;

interface StandardQuery
{
    public function isPublished(string $alias = null, string $fieldName = 'published'): ActiveQueryInterface;

    public function isNotPublished(string $alias = null, string $fieldName = 'published'): ActiveQueryInterface;

    public function isActive(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDraft(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isNotDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isArchived(string $alias = null, string $fieldName = 'archived'): ActiveQueryInterface;

    public function isNotArchived(string $alias = null, string $fieldName = 'archived'): ActiveQueryInterface;

    public function isEnabled(string $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface;

    public function isDisabled(string $alias = null, string $fieldName = 'enabled'): ActiveQueryInterface;

    public function isDefault(string $alias = null, string $fieldName = 'default'): ActiveQueryInterface;

    public function isNotDefault(string $alias = null, string $fieldName = 'default'): ActiveQueryInterface;
}
