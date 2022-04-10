<?php

namespace app\models;


class Basket extends Model
{
    public $id;
    public $user_id;
    public $products = [];

    protected function getTableName()
    {
        return 'basket';
    }


    public function getProducts()
    {
        return 'Состав корзины' . '<br>';
    }

    public function addProduct(Product $product)
    {
        return "Товар добавлен" . '<br>';
    }

    public function deleteProduct(Product $product)
    {

        return "Товар удален" . '<br>';
    }
}