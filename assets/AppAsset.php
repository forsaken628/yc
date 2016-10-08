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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-reset.css',
        'css/google-font/css.css',
        'css/jquery-ui-1.10.3.css',
        'fonts/css/font-awesome.min.css',
        'css/style.css',
        'css/style-responsive.css',
    ];
    public $js = [
        'js/jquery.nicescroll.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\ValidationAsset',
        'app\assets\BootstrapTableAsset',
        'app\assets\VueAsset',
    ];
}
