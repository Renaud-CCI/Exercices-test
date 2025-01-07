<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Item;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty() {
        $item = new Item();
        $this->assertNotEmpty($item->getDescription());
    }
    
    public function testIDisAnInteger() {
        $item = new Item();
        $reflection = new ReflectionClass($item);
        $method = $reflection->getMethod('getID');
        $method->setAccessible(true);
        $id = $method->invoke($item);
        $this->assertIsInt($id);
    }    

    public function testTokenIsAString() {
        $item = new Item();
        $reflection = new ReflectionClass($item);
        $method = $reflection->getMethod('getToken');
        $method->setAccessible(true);
        $token = $method->invoke($item);
        $this->assertIsString($token);
    }    

    public function testPrefixedTokenStartsWithPrefix() {
        $item = new Item();
        $reflection = new ReflectionClass($item);
        $method = $reflection->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        $prefix = 'prefix_';
        $prefixedToken = $method->invoke($item, $prefix);
        $this->assertStringStartsWith($prefix, $prefixedToken);
    }   
}
