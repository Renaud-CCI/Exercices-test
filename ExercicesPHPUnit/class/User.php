<?php

namespace ExercicesPHPUnit\class;

use ExercicesPHPUnit\class\Mailer;
use Exception;

class User {

    public $first_name;
    public $surname;
    public $email;
    protected $mailer;
    protected $mailer_callable;

    public function __construct($email) {
        $this->email = $email;
    }

    public function getFullName() {
        return trim("$this->first_name $this->surname");
    }

    public function setMailer($mailer) {
        $this->mailer = $mailer;        
    }

    public function notify($message) {
        if (empty($this->email)) {
            throw new \Exception('Email is empty');
        }
        return $this->mailer->send($this->email, $message);         
    }

    public function setMailerCallable($mailer_callable) {
        $this->mailer_callable = $mailer_callable;
    }     
}