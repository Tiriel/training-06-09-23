<?php

namespace App\DesignPatterns\Factory;

use App\DesignPatterns\Decorator\DecoratorBold;
use App\DesignPatterns\Decorator\DecoratorItalic;

enum PenDecorators
{
    case Bold;
    case Italic;
}
