<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Queue;
use ExercicesPHPUnit\class\QueueException;

class QueueTest extends TestCase {

    protected $queue;

    protected function setUp() :void
    {
        $this->queue = new Queue();
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue() {
        $this->queue->push('item');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue() {
        $this->queue->push('item');
        $item = $this->queue->pop();
        $this->assertEquals('item', $item);
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testQueueIsCleared() {
        $this->queue->push('item1');
        $this->queue->push('item2');
        $this->queue->clear();
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testQueueThrowsExceptionWhenFull() {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push('item' . $i);
        }

        $this->expectException(QueueException::class);
        $this->queue->push('item' . Queue::MAX_ITEMS);
    }
}