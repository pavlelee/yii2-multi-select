<?php
/**
 * User: Liv <523260513@qq.com>
 * Date: 15/9/10
 * Time: 下午7:54
 */

namespace pavle\multiselect;


use yii\web\AssetBundle;

class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@pavle/multiselect/assets';

    public $css = [
        'css/multi.css'
    ];

    public $js = [
        'js/multi.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}