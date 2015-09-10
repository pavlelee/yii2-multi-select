<?php

namespace pavle\multiselect;
use yii\bootstrap\Html;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class MultiSelectWidget extends InputWidget
{
    public $url;

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        if ($this->hasModel()) {
            $this->name = $this->name ?: Html::getInputName($this->model, $this->attribute);
            $this->value = $this->value ?: Html::getAttributeValue($this->model, $this->attribute);
        }
    }


    public function run()
    {
        return $this->render('main', [
            'name' => $this->name,
            'value' => $this->value
        ]);
    }
}
