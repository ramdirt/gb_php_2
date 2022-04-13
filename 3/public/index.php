<?php

use app\engine\Autoload;
use app\models\{Product, User};
use app\engine\Db;

//TODO добавьте абсолютные пути
include "../engine/Autoload.php";
include "../config/config.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Пицца", "Описание", 125);
$product->insert();

$user = new User("User", 125);
$user->insert();



//$product = new Product();

//$product = $product->getOne(2);
//$product->delete();
