<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\Doctor;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {
        $person = new Doctor('Bob');
        $this->assertEquals('Dr. Bob', $person->getNameAndTitle());
    }
    
    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $person = new Doctor('Bob');
        $this->assertEquals('Dr. Bob', $person->getNameAndTitle());
    }    
}