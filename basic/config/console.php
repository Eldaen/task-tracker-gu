<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$token = require __DIR__. '/telegram_token.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'bot' => [
            'class' => 'SonkoDmitry\Yii\TelegramBot\Component',
            'apiToken' => $token,
        ],
        'db' => $db,
    ],
    'params' => $params,

    /*'controllerMap' => [
        'migration' => [
          'class' => 'bizley\migration\controllers\MigrationController',
        ],
    ],*/

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
