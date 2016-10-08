<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-10-07
 * Time: 17:44
 */

namespace app\assets;

use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/moment';
    public $js = [
        'moment' . (YII_ENV_DEV ? '.js' : '.min.js'),
    ];
}