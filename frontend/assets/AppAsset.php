<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style2.css',
        // 'css/bootstrap.min.css',
    ];
    public $js = [
        'js/modernizr.custom.53451.js',
        'js/bootstrap.min.js',
        'js/jquery.gallery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}