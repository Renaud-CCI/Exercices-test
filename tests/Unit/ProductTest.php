<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Product;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();
        $product_id = $product->getProductId();
        $this->assertIsInt($product_id);
    }
}
