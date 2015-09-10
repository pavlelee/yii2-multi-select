<?php

namespace pavle\multiselect;
use yii\widgets\InputWidget;

/**
 * This is just an example.
 */
class MultiSelectWidget extends InputWidget
{
    public $url;

    public function run()
    {
        return $this->render('main', [
            'name' => $this->name,
            'value' => $this->value
        ]);
    }
}
