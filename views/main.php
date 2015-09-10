<?php
use kartik\select2\Select2;
use pavle\multiselect\MultiSelectAsset;
use pavle\multiselect\MultiSelectWidget;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;

/**
 * User: Liv <523260513@qq.com>
 * Date: 15/9/10
 * Time: 下午5:58
 */

/* @var $this View */
/* @var $name string */
/* @var $value string */

/* @var $widget MultiSelectWidget */
$widget = $this->context;
MultiSelectAsset::register($this);

$value = $widget->value ? : [];
$var = Json::encode($value);
$js = <<<JS
var list = {$var};
initMultiSelectHandle(list);
JS;

$this->registerJs($js);
?>

<?= Select2::widget([
    'name' => $widget->name,
    'options' => ['placeholder' => Yii::t('shopping', 'Search for Attribute')],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 1,
        'ajax' => [
            'url' => Url::to($widget->url),
            'dataType' => 'json',
        ],
    ],
    'pluginEvents' => [
        "select2:select" => "multiSelectBack",
    ],
]) ?>

<?= Html::hiddenInput($widget->name)?>
<div id="container-multi-select" class="well well-sm">

</div>

<script type="text/html" id="template-multi-select">
    <div class="item-multi-select" data-id="{{id}}">
        <i class="fa fa-minus-circle multi-select-remove"></i> {{text}}
        <input type="hidden" name="<?= Html::getInputName($widget->model, $widget->attribute)?>[{{id}}]" value="{{text}}">
    </div>
</script>