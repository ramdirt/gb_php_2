<?php

// 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п. или любой другой области. Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. Приведите пример использования. ВАЖНОЕ.


class Price
{
  public $value;
  public $currency;
  public $discount;

  function __construct($value = null, $currency = 'RUS')
  {
    $this->value = $value;
    $this->currency = $currency;
  }

  public function get()
  {
    if (!$this->discount) {
      return $this->value;
    } else {
      return $this->value * (0.01 * (100 - $this->discount));
    }
  }

  public function setDiscount($discount)
  {
    if ($discount < 99) {
      $this->discount = $discount;
    }
  }
}

class Product
{
  public $name;
  public $price;
  public $category;

  public function __construct(
    $name = null,
    $price = null,
    $category = null
  ) {
    $this->name = $name;
    $this->price = $price;
    $this->category = $category;
  }
};

class Bed extends Product
{
  public $cloth;
  public $size;

  public function __construct(
    $name = null,
    $price = null,
    $category = null,
    $cloth = null,
    $size = null
  ) {
    parent::__construct($name, $price, $category);
    $this->cloth = $cloth;
    $this->size = $size;
  }

  public function info()
  {
    echo "{$this->name} из ткани {$this->cloth} стоимостью {$this->price->get()} рублей";
  }

  public function getPrice()
  {
    if ($this->price->discount) {

      echo "{$this->name} стоит {$this->price->get()} рублей, скидка {$this->price->discount}%";
    } else {

      echo "{$this->name} стоит {$this->price->get()} рублей";
    }
  }
}


$bed = new Bed('Кровать Fabiano', new Price(100000), 'Кровати', 'Arbus', '200*180');
$bed->info();
echo '<br>';
$bed->getPrice();
echo '<br>';
$bed->price->setDiscount(55);

$bed->getPrice();