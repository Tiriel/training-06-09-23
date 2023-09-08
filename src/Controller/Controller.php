<?php

namespace App\Controller;

use App\Model\Db\Query;
use App\View\Renderer;

abstract class Controller
{
    public function __construct(
        protected Renderer $renderer,
        protected Query $query,
    ) {}
}
