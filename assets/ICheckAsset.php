<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author 周立人
 *
 */
class ICheckAsset extends AssetBundle
{
    public $basePath = '@webroot/js/iCheck';
    public $baseUrl = '@web/js/iCheck';
    public $css = [
        'skins/minimal/minimal.css',
        'skins/square/square.css',
        'skins/square/red.css',
        'skins/square/blue.css',
    ];
    public $js = [
        'jquery.icheck.js',
        '/js/icheck-init.js',
    ];
    public $depends = [
    ];
}
