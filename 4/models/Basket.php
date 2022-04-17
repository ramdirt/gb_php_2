<?php

namespace app\models;

class Basket extends DBModel
{
    public $id;
    public $session_id;
    public $product_id;


    public static function getBasket() {
        //запрос на корзину
    }

    public static function getTableName()
    {
        return 'basket';
    }
}