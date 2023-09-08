<?php

namespace Tests\Vehicle;

use App\Vehicle\Car;
use App\Vehicle\Wheel;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    public function testDefaultCarHasFourWheels(): void
    {
        $car = new Car([new Wheel(), new Wheel(), new Wheel(), new Wheel()]);

        $this->assertCount(4, $car->getWheels());
    }

    public function testConstructThrowsWithoutEnoughWheels(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $car = new Car([new Wheel(), new Wheel(), new Wheel()]);
    }

    public function testConstructThrowsWithNoWheels()
    {
        $this->expectException(\InvalidArgumentException::class);

        $car = new Car([new \stdClass()]);
    }
}
