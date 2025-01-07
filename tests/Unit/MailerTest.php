<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Mailer;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue() {
        $mailer = new Mailer();
        $result = $mailer->sendMessage('test@example.com', 'Hello World');
        $this->assertTrue($result);
    }

    public function testSendMessageThrowsExceptionWithEmptyEmail() {
        $this->expectException(Exception::class);
        $mailer = new Mailer();
        $mailer->sendMessage('', 'Hello World');
    }
}