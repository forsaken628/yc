<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-09
 * Time: 11:44
 */

namespace app\assets;

use yii\web\AssetBundle;


class ValidationAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/jquery-validation/dist';
    public $css = [];
    public $js = [
        'jquery.validate' . (YII_ENV_DEV ? '.js' : '.min.js'),
    ];
    public $depends = [];
}