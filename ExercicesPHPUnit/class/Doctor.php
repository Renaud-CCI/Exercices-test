<?php

namespace ExercicesPHPUnit\class;

use ExercicesPHPUnit\class\AbstractPerson;

class Doctor extends AbstractPerson
{
    protected function getTitle() {
        return 'Dr.';
    }
}