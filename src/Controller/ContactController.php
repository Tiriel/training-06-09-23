<?php

namespace App\Controller;

class ContactController extends Controller
{
    public function contact(): string
    {
        return $this->renderer->render('contact.html.twig');
    }
}
