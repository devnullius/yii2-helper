<?php
declare(strict_types=1);

namespace devnullius\helper\forms;

use function strtotime;

trait CoreFormTrait
{
    public function toBoolean($attribute): void
    {
        $this->{$attribute} = (boolean)$this->{$attribute};
    }

    public function toInt($attribute): void
    {
        $this->{$attribute} = (int)$this->{$attribute};
    }

    public function toFloat($attribute): void
    {
        $this->{$attribute} = (float)$this->{$attribute};
    }

    public function toString($attribute): void
    {
        $this->{$attribute} = (string)$this->{$attribute};
    }

    public function convertDate($attribute): void
    {
        $attributeValue = $this->{$attribute};
        if (empty($attributeValue)) {
            $this->{$attribute} = null;

            return;
        }
        $this->{$attribute} = strtotime($attributeValue);
    }
}
