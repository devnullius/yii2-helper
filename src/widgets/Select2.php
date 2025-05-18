<?php
declare(strict_types=1);

namespace devnullius\helper\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class Select2 extends Widget
{
    public string $class = 'form-control select2';
    public string $style = 'width: 100%;';
    public string $prompt = '';
    public array $tags = [];

    public array $data = [];
    public $selected; // maybe array for multi-select
    public string $attribute = '';
    public $model;
    public $label;
    public $error;

    public function init(): void
    {
        parent::init();
        $options = ['class' => $this->class, 'style' => $this->style, 'prompt' => $this->prompt];
        if (!empty($this->tags) && is_array($this->tags)) {
            $options = array_merge($options, $this->tags);
        }
        if (!is_object($this->model)) {
            echo Html::dropDownList($this->attribute, $this->selected, $this->data, $options);
        }
        if (is_object($this->model)) {
            if ($this->label !== null) {
                echo Html::activeLabel($this->model, $this->attribute);
            }
            echo Html::activeDropDownList($this->model, $this->attribute, $this->data, $options);
            if ($this->error !== null) {
                echo Html::error($this->model, $this->attribute);
            }
        }
        $this->view->registerJs('$(".select2").select2();', View::POS_END);
    }
}
