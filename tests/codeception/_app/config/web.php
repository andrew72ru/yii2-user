<?php

$config = [
    'id'        => 'yii2-user-test',
    'basePath'  => dirname(__DIR__),
    'bootstrap' => [
        'andrew72ru\user\Bootstrap',
    ],
    'extensions' => require(VENDOR_DIR.'/yiisoft/extensions.php'),
    'aliases' => [
        '@andrew72ru/user' => realpath(__DIR__.'/../../../../'),
        '@vendor'        => VENDOR_DIR,
        '@bower'         => VENDOR_DIR.'/bower',
        '@tests/codeception/config' => '@tests/codeception/_config',
    ],
    'modules' => [
        'user' => [
            'class' => 'andrew72ru\user\Module',
            'admins' => ['user'],
        ],
    ],
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__.'/../assets',
        ],
        'log'   => null,
        'cache' => null,
        'request' => [
            'enableCsrfValidation'   => false,
            'enableCookieValidation' => false,
        ],
        'db' => require __DIR__.'/db.php',
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
    ],
];

if (defined('YII_APP_BASE_PATH')) {
    $config = Codeception\Configuration::mergeConfigs(
        $config,
        require YII_APP_BASE_PATH.'/tests/codeception/config/config.php'
    );
}

return $config;
