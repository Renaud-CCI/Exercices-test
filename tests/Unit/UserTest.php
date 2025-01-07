<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\User;
use Mockery;

class UserTest extends TestCase {

    public function tearDown() :void
    {
        Mockery::close();
    }

    public function testReturnsFullName() {
        $user = new User('test@example.com');
        $user->first_name = 'John';
        $user->surname = 'Doe';
        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() {
        $user = new User('test@example.com');
        $this->assertEquals('', $user->getFullName());
    }


    /**
     * @description("Nous pouvons aussi définir les attributs des méthodes de test en utilisant l'annotation @test ou l'attribut #[Test] plutôt que de préfixer la méthode par le mot test.")
     **/
    #[Test]
    public function user_has_first_name() {
        $user = new User('test@example.com');
        $user->first_name = 'John';
        $this->assertEquals('John', $user->first_name);
    }

    public function testNotificationIsSent() {
        $user = new User('test@example.com');

        $mailerMock = Mockery::mock('ExercicesPHPUnit\class\Mailer');
        $mailerMock->shouldReceive('send')
                   ->once()
                   ->with('test@example.com', 'Hello World')
                   ->andReturn(true);

        $user->setMailer($mailerMock);
        $this->assertTrue($user->notify('Hello World'));
    }

    public function testCannotNotifyUserWithNoEmail() {
        $this->expectException(\Exception::class);

        $user = new User('');
        $user->notify('Hello World');
    }

    public function testNotifyReturnsTrue() {
        $user = new User('test@example.com');

        $mailerMock = Mockery::mock('ExercicesPHPUnit\class\Mailer');
        $mailerMock->shouldReceive('send')
                   ->once()
                   ->with('test@example.com', 'Hello World')
                   ->andReturn(true);

        $user->setMailer($mailerMock);
        $this->assertTrue($user->notify('Hello World'));
    }
}