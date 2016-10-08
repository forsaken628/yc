<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-09
 * Time: 17:44
 */

namespace app\assets;

use yii\web\AssetBundle;

class NestableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "js/nestable/jquery.nestable.css",
    ];
    public $js = [
        "js/nestable/jquery.nestable.js"
    ];

}