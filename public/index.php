<?php
$ScriptName = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
define('SYSTEM_URL', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$ScriptName}");
define('NAMESISTEM', "Gateway Whatsapp");
require '../vendor/autoload.php';

$config = require '../app/config/config-dev.php';
$app = new \Slim\App($config);

require '../app/config/dependencies.php';
require '../app/config/routes.php';

$app->run();
