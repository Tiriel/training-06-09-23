<?php

namespace App\DesignPatterns\Factory;

use App\DesignPatterns\Decorator\DecoratorBold;
use App\DesignPatterns\Decorator\DecoratorItalic;
use App\DesignPatterns\Decorator\Pen;
use App\DesignPatterns\Decorator\WritingInterface;

class PenFactory
{
    public static function create(...$decorators): WritingInterface
    {
        $pen = new Pen();

        foreach ($decorators as $decorator) {
            if (!$decorator instanceof PenDecorators) {
                throw new \InvalidArgumentException();
            }

            $class = match ($decorator) {
                PenDecorators::Bold => DecoratorBold::class,
                PenDecorators::Italic => DecoratorItalic::class,
            };
            $pen = new $class($pen);
        }

        return $pen;
    }
}
