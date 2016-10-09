<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-10-09
 * Time: 12:47
 */

namespace app\assets;

use yii\web\AssetBundle;


class DateTimePickerAsset extends AssetBundle
{
    //public $sourcePath = '@vendor/bower-asset/bootstrap-datetimepicker';
    public $basePath = '@webroot';
    public $baseUrl = '@web/js/bootstrap-datetimepicker';
    public $js = [
//        'build/js/bootstrap-datetimepicker.min.js',
//        'src/js/bootstrap-datetimepicker.js',
        'js/bootstrap-datetimepicker.js',
    ];
    public $css = [
        //'css/datetimepicker-custom.css',
        'css/datetimepicker.css',
    ];
//    public $depends=[
//        'app\assets\MomentAsset',
//    ];

}