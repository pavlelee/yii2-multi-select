<?php

namespace pavle\multiselect;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class MultiSelectWidget extends InputWidget
{
    public $url;

    public $select2Options = [];

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

        $this->select2Options = ArrayHelper::merge([
            'id' => $this->id,
            'name' => $this->name,
            'options' => ['placeholder' => Yii::t('shopping', 'Search for Attribute')],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 1,
                'ajax' => [
                    'url' => Url::to($this->url),
                    'dataType' => 'json',
                ],
            ],
            'pluginEvents' => [
                "select2:select" => "multiSelectBack",
            ],
        ], $this->select2Options);
    }


    public function run()
    {
        return $this->render('main', [
            'name' => $this->name,
            'value' => $this->value
        ]);
    }
}
