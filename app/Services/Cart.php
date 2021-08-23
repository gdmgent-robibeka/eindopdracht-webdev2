<?php

namespace App\Services;

class Cart
{
    public function __construct() {

    }

    public function add($data) {
        $collection = $this->get();

        $collection->add($data);

        session(['shopping_cart' => $collection]);
    }

    public function get() {
        return session('shopping_cart', new CartCollection());
    }
}
