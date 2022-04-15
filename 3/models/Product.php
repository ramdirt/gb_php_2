<?php

namespace app\models;


class Product extends Model
{
    public $id;
    public $category_id;
    public $title;
    public $price;
    public $description;


    public function __construct($category_id = null, $title = null, $price = null, $description = null)
    {
        $this->category_id = $category_id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }


    protected function getTableName()
    {
        return 'products';
    }
}
