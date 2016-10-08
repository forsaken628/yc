<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-26
 * Time: 16:34
 */

namespace app\assets;

use yii\web\AssetBundle;


class VueAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/vue/dist';
    public $js = [
        'vue' . (YII_ENV_DEV ? '.js' : '.min.js'),
    ];
}