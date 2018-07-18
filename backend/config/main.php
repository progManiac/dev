<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
return [
    'id' => 'app-backend',
    'name' => 'Market Cupid - Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-dev',
                'httpOnly' => true,
                'domain' => $params['cookieDomain']
            ]
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'dev',
            'cookieParams' => [
                'httpOnly' => true,
                'domain' => $params['cookieDomain'],
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'backendUrlManager' => require yii::getAlias('@beUrlManager'),
        'frontendUrlManager' => require yii::getAlias('@feUrlManager'),
        'urlManager' => function () {
            return \Yii::$app->get('backendUrlManager');
        }//require yii::getAlias('@beUrlManager'),
    ],
    /*'as access' => [
        'class' => yii\filters\AccessControl::className(),
        'except' => ['auth/login', 'site/error'],
        'rules' => [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],*/
    'params' => $params,
];
