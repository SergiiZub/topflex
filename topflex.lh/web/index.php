<?php
//var_dump($_SERVER['HTTP_HOST']);
//die('tut');
//ini_set('display_errors','1');
ini_set('error_reporting', E_ALL);

if ((isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == '127.0.0.1')) || $_SERVER['SERVER_ADDR'] == '192.168.42.42') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
}

ini_set('display_errors', YII_DEBUG);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../common/config/bootstrap.php');

// определяем запрошенный APP
switch ($_SERVER['HTTP_HOST']) {
    case 'frontend.topflex.lh':
    case 'topflex.lh':
        define('YII_APP', 'frontend');
        break;
    case 'backend.topflex.lh':
    case 'admin.topflex.lh':
        define('YII_APP', 'backend');
        break;
    default:
        // лично у меня тут 301й редирект на главную
        exit("domain not defined");
}

// определяем папку приложения и подключаем его конфиг
define('YII_APP_DIR', Yii::getAlias('@apps') . '/' . YII_APP);
require(YII_APP_DIR . '/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../common/config/main.php'),
    require(__DIR__ . '/../common/config/main-local.php'),
    require(YII_APP_DIR . '/config/main.php'),
    require(YII_APP_DIR . '/config/main-local.php')
);

(new yii\web\Application($config))->run();
