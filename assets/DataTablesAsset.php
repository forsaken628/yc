<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/advanced-datatable/css/demo_page.css',
        'js/advanced-datatable/css/demo_table.css',
    ];
    public $js = [
 //       'js/advanced-datatable/js/jquery.dataTables' . (YII_ENV_DEV ? '.js' : '.min.js'),
        'js/advanced-datatable/1.10.4/jquery.dataTables.min.js',
    ];
    public $depends = [

    ];
}
