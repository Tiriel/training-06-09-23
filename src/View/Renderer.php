<?php

namespace App\View;

use Twig\Environment;

class Renderer
{
    public function __construct(private Environment $twig)
    {
    }

    public function render(string $name, array $context = []): string
    {
        return $this->twig->render($name, $context);
    }
}
