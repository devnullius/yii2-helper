<?php
declare(strict_types=1);

namespace devnullius\helper\helpers;

/**
 * Trait StandardMarkFunctionTrait
 *
 * @package devnullius\helper\helpers
 */
trait StandardMarkFunctionTrait
{

    public function markAsDeleted(string $fieldName = 'deleted'): void
    {
        $this->markPositive($fieldName);
    }

    private function markPositive(string $fieldName): void
    {
        $this->{$fieldName} = true;
    }

    public function markAsNotDeleted(string $fieldName = 'deleted'): void
    {
        $this->markNegative($fieldName);
    }

    private function markNegative(string $fieldName): void
    {
        $this->{$fieldName} = false;
    }

    public function markAsArchived(string $fieldName = 'archived'): void
    {
        $this->markPositive($fieldName);
    }

    public function markAsNotArchived(string $fieldName = 'archived'): void
    {
        $this->markNegative($fieldName);
    }

    public function markAsEnabled(string $fieldName = 'enabled'): void
    {
        $this->markPositive($fieldName);
    }

    public function markAsDisabled(string $fieldName = 'enabled'): void
    {
        $this->markNegative($fieldName);
    }

    public function markAsPublished(string $fieldName = 'published'): void
    {
        $this->markPositive($fieldName);
    }

    public function markAsUnPublished(string $fieldName = 'published'): void
    {
        $this->markNegative($fieldName);
    }
}
