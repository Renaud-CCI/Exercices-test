<?php

namespace ExercicesPHPUnit\class;

class Product
{
    protected $product_id;
    
    public function __construct() {
        $this->product_id = rand();
    }

    public function getProductId() {
        return $this->product_id;
    }
}
