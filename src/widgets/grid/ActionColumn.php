<?php
declare(strict_types=1);

namespace devnullius\helper\widgets\grid;

use devnullius\helper\Module;
use yii\helpers\Html;
use function array_merge;
use function ucfirst;

class ActionColumn extends \yii\grid\ActionColumn
{
    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons(): void
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'edit');
        $this->initDefaultButton('delete', 'trash-alt', [
            'data-confirm' => Module::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
        ]);
    }

    /**
     * Initializes the default button rendering callback for a single button.
     *
     * @param string $name              Button name as it's written in template
     * @param string $iconName          The part of fontawesome far class that makes it unique
     * @param array  $additionalOptions Array of additional options
     *
     * @since 2.0.11
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = []): void
    {
        if (!isset($this->buttons[$name]) && str_contains($this->template, '{' . $name . '}')) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                $title = match ($name) {
                    'view' => Module::t('yii', 'View'),
                    'update' => Module::t('yii', 'Update'),
                    'delete' => Module::t('yii', 'Delete'),
                    default => ucfirst($name),
                };
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', ['class' => "far fa-$iconName"]);

                return Html::a($icon, $url, $options);
            };
        }
    }
}
