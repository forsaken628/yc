<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DynamicTableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/data-tables/DT_bootstrap.css',
    ];
    public $js = [
        'js/data-tables/DT_bootstrap.js',
    ];
    public $depends = [
        'app\assets\DataTablesAsset',
    ];
}
