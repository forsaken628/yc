<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class BootstrapTableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/wenzhixin/bootstrap-table/dist';
//    public $css = [
//        'bootstrap-table' . (YII_ENV_DEV ? '.css' : '.min.css'),
//    ];
    public $js = [
        'bootstrap-table' . (YII_ENV_DEV ? '.js' : '.min.js'),
        'locale/bootstrap-table-zh-CN.js',
    ];
    public $depends = [

    ];
}
