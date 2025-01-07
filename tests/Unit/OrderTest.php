<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Order;
use ExercicesPHPUnit\class\PaymentGateway;
use Mockery;

class OrderTest extends TestCase {

    //Utiliser la librairie Mockery : https://github.com/mockery/mockery


    /*  
        Qu'est-ce que la methode tearDown() ?
        Quel est le but de cette methode ?
        Quel est le but de la methode tearDown() dans ce test a votre avis ?
        Tips parce que je suis sympatique: https://docs.phpunit.de/en/10.5/fixtures.html
    */
    protected function tearDown():void
    {
        Mockery::close();
    }

    //Créer un mock
    public function testOrderIsProcessedUsingAMock() {
        $gatewayMock = Mockery::mock(PaymentGateway::class);
        $gatewayMock->shouldReceive('charge')
                    ->once()
                    ->with(100)
                    ->andReturn(true);

        $order = new Order(2, 50);
        $result = $order->process($gatewayMock);

        $this->assertTrue($result);
    }
    
    //Créer un spy
    public function testOrderIsProcessedUsingASpy() {
        $gatewaySpy = Mockery::spy(PaymentGateway::class);

        $order = new Order(2, 50);
        $order->process($gatewaySpy);

        $gatewaySpy->shouldHaveReceived('charge')
                   ->once()
                   ->with(100);
        $this->assertTrue(true);
    }
}