<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-10-07
 * Time: 17:00
 */

namespace app\assets;

use yii\web\AssetBundle;

class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/fullcalendar/dist';
    public $js = [
        'fullcalendar' . (YII_ENV_DEV ? '.js' : '.min.js'),
    ];
    public $css=[
        'fullcalendar' . (YII_ENV_DEV ? '.css' : '.min.css'),
    ];
    public $depends=[
        'app\assets\MomentAsset',
    ];
}