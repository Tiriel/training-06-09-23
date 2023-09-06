<?php

// A class is the pattern to build an object
class Car // classname
{
    // a class may contain properties
    private string $brand = ''; // properties must have a visibility, may have a type, and default value

    // a class may contain methods
    public function displayBrand(): void // method signature: {visibility} function {method name}([...arguments])[: return type]
    {
        // insert logic here
        echo $this->brand;
    }
}
