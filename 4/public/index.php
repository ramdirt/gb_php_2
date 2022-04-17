<?php

use app\engine\Autoload;
use app\models\{Product, User};


//TODO добавьте абсолютные пути
include "../engine/Autoload.php";
include "../config/config.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product("Пицца","Описание", 125);



$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}



