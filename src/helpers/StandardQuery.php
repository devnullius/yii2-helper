<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

use yii\db\ActiveQueryInterface;

interface StandardQuery
{
    public function isPublished(string $alias = null, string $fieldName = 'is_published'): ActiveQueryInterface;

    public function isNotPublished(string $alias = null, string $fieldName = 'is_published'): ActiveQueryInterface;

    public function isActive(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDraft(string $alias = null, string $fieldName = 'status'): ActiveQueryInterface;

    public function isDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isNotDeleted(string $alias = null, string $fieldName = 'deleted'): ActiveQueryInterface;

    public function isArchived(string $alias = null, string $fieldName = 'is_archived'): ActiveQueryInterface;

    public function isNotArchived(string $alias = null, string $fieldName = 'is_archived'): ActiveQueryInterface;
}
