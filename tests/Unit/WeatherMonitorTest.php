<?php

use PHPUnit\Framework\TestCase;
use ExercicesPHPUnit\class\WeatherMonitor;
use ExercicesPHPUnit\class\TemperatureService;
use Mockery;

class WeatherMonitorTest extends TestCase {

    public function tearDown():void
    {
        Mockery::close();
    }
    
    public function testCorrectAverageIsReturned() {
        $serviceMock = Mockery::mock(TemperatureService::class);
        $serviceMock->shouldReceive('getTemperature')
                    ->with('start')
                    ->andReturn(20);
        $serviceMock->shouldReceive('getTemperature')
                    ->with('end')
                    ->andReturn(30);

        $monitor = new WeatherMonitor($serviceMock);
        $average = $monitor->getAverageTemperature('start', 'end');

        $this->assertEquals(25, $average);
    }        
    
    public function testCorrectAverageIsReturnedWithMockery() {
        $serviceMock = Mockery::mock(TemperatureService::class);
        $serviceMock->shouldReceive('getTemperature')
                    ->with('start')
                    ->andReturn(20);
        $serviceMock->shouldReceive('getTemperature')
                    ->with('end')
                    ->andReturn(30);

        $monitor = new WeatherMonitor($serviceMock);
        $average = $monitor->getAverageTemperature('start', 'end');

        $this->assertEquals(25, $average);
    }  
}




