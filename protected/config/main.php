<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/booster');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Havanatur',
    'language' => 'es',
    // preloading 'log' component
    'preload' => array('booster'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'jonathan19',
            'generatorPaths' => array(
                'booster.gii.bootstrap'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //	'ipFilters'=>array('127.0.0.1','::1','192.168.0.23'),
            'ipFilters' => array($_SERVER["REMOTE_ADDR"], '::1'),
        ),
    ),
    // application components
    'components' => array(
        'phpThumb'=>array(
            'class'=>'ext.EPhpThumb.EPhpThumb',
            'options'=>array()
        ),

        'swiftMailer' => array(
            'class' => 'ext.swiftMailer.SwiftMailer',
        ),
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendor.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                )
            )
        ),
        'booster' => array(
            'class' => 'booster.components.Booster',
            'fontAwesomeCss' => TRUE,
        ),
        
        'user' => array(
            'loginUrl' => array('admin/index'),
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
