<?php

namespace app\models;


class User extends Model
{

    public $id;
    public $order_id;
    public $product_id;
    public $product_name;
    public $price;
    public $quantity;


    public function __construct($order_id = null, $product_id = null, $product_name = null, $price = null, $quantity = null)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    protected function getTableName()
    {
        return 'orders_details';
    }
}