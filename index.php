<?php

// FRONT COTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED);

// 2. Подключение файлов системы

session_start();
define('ROOT', dirname(__FILE__));
include ROOT . '/components/Autoload.php';
require_once(ROOT . '/components/Router.php');


// 3. Установка соединения с БД


include ROOT . '/components/Db.php';
// 4. Вызор Router

$router = new Router();
$router->run();