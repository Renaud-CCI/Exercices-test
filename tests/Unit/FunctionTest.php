<?php
	
require __DIR__ . '/../../ExercicesPHPUnit/functions.php';
use PHPUnit\Framework\TestCase; 
use function ExercicesPHPUnit\add;

class FunctionTest extends TestCase {

    public function testAddReturnsTheCorrectSum() {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(0, add(-1, 1));
    }

    public function testAddDoesNotReturnTheIncorrectSum() {
        $this->assertNotEquals(5, add(2, 2));
        $this->assertNotEquals(1, add(-1, 1));
    }
}
	
?>