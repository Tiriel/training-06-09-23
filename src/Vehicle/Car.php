<?php

namespace App\Vehicle;

// A class is the pattern to build an object
use App\Blueprint\Remote;

class Car // classname
{
    private const BRANDS = [
        'Renault',
        'Citroën',
        'Peugeot',
    ];
    // a class may contain properties
    private string $brand = ''; // properties must have a visibility, may have a type, and default value

    /**
     * @var Wheel[]
     */
    private array $wheels = [];

    public function __construct(array $wheels)
    {
        if (\count($wheels) !== 4 || !$wheels[0] instanceof Wheel) {
            throw new \InvalidArgumentException();
        }
        $this->wheels = $wheels;
    }

    public function open(Remote $remote): void
    {
        $remote->openCar($this);
    }

    // a class may contain methods
    public function displayBrand(): void // method signature: {visibility} function {method name}([...arguments])[: return type]
    {
        // insert logic here
        echo $this->brand;
    }

    public function setBrand(string $brand): static
    {
        if (!\in_array($brand, self::BRANDS)) {
            throw new \InvalidArgumentException();
        }

        $this->brand = $brand;

        return $this;
    }

    public function getWheels(): array
    {
        return $this->wheels;
    }

    public function addWheel(Wheel $wheel): void
    {
        $this->wheels[] = $wheel;
    }
}
