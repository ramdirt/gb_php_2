<?php
$DBH = new PDO("mysql:host=localhost;dbname=shop_db_2", 'root', '');
$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$STH = $DBH->prepare("SELECT * FROM `products` WHERE id = :id");
$data = ['id' => 1];
$STH->execute($data);
foreach ($STH->fetch() as $key => $value) {
    var_dump($key . '=>' . $value);
    echo '<br>';
}