<?php

namespace app\models;


class User extends Model
{

    public $id;
    public $user_id;
    public $product_id;
    public $quantity;

    public function __construct($user_id = null, $product_id = null, $quantity = null)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    protected function getTableName()
    {
        return 'orders';
    }
}