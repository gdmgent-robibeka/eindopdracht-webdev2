<?php

namespace App\Services;

class CartItem
{
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $model;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
        $this->model = $data['model'];
    }

    public function getTotal() {
        return $this->price * $this->quantity;
    }
}
