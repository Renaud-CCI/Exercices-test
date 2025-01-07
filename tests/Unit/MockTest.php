<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Mailer;

class MockTest extends TestCase
{
    public function testMock()
    {
        //Créer un mock de la fonction mailer
        $mailerMock = $this->createMock(Mailer::class);
        $mailerMock->method('sendMessage')
                   ->willReturn(true);

        //Implémenter dans ce mock la methode sendMessage et la faire retourner true
        $this->assertTrue($mailerMock->sendMessage('test@example.com', 'Hello World'));

        //Tester naivement que la méthode du mock retourne true
        $mailerMock->expects($this->once())
                   ->method('sendMessage')
                   ->with('test@example.com', 'Hello World');

        //Utiliser le mock de phpunit ou de mockery pour tester que la méthode sendMessage est appelée
        $mailerMock->sendMessage('test@example.com', 'Hello World');
    }
}