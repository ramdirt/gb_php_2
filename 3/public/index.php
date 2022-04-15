<?php

use app\engine\Autoload;
use app\models\{Product, User};
use app\engine\Db;

//TODO добавьте абсолютные пути
include dirname(__DIR__) .  "/engine/Autoload.php";
include dirname(__DIR__) . "/config/config.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product(1, 'name', 125, 'description');
$product->insert();
$product->delete();

$user = new User("User", 125);
$user->insert();



//$product = new Product();

//$product = $product->getOne(2);
//$product->delete();