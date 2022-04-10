<?php

include "../engine/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

use app\engine\Db;
use app\models\Basket;
use app\models\figures\Circle;
use app\models\{Product, User};
use app\models\figures\Triangle;
use app\models\figures\Rectangle;

$db = new Db();
$product = new Product($db);
$user = new User($db);
$basket = new Basket($db);


echo $product->getOne(4);
echo $product->getAll();


echo $user->getOne(1);
echo $user->getAll();

echo $basket->getProducts();
echo $basket->addProduct($product);
echo $basket->deleteProduct($product);
echo $basket->getOne(1);

echo "<br>";
$rectangle = new Rectangle(10, 15);
$rectangle->info();
$rectangle->calculateArea();
$rectangle->calculatePerimeter();

echo "<br>";
$circle = new Circle(10);
$circle->info();
$circle->calculateArea();
$circle->calculatePerimeter();


echo "<br>";
$triangle = new Triangle(10);
$triangle->info();
$triangle->calculateArea();
$triangle->calculatePerimeter();