<?php

namespace ExercicesPHPUnit\class;

class TemperatureService {

    public function getTemperature($time) {
        $temperatures = [
            'start' => 20,
            'end' => 30
        ];

        return $temperatures[$time];
    }
}
