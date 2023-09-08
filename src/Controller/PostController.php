<?php

namespace App\Controller;

use App\Model\Post;

class PostController extends Controller
{
    public function index(): string
    {
        return $this->renderer->render('index.html.twig');
    }

    public function get(string $slug): string
    {
        $post = $this->query->getOneBySlug(Post::class, $slug);
        
        return $slug;
    }
}
