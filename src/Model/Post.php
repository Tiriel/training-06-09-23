<?php

namespace App\Model;

class Post
{
    public function __construct(
        private int $id,
        private string $title,
        private string $slug,
        private string $content,
        private \DateTimeImmutable $publishedAt,
        private string $author,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): Post
    {
        $this->slug = $slug;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    public function getPublishedAt(): \DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): Post
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Post
    {
        $this->author = $author;
        return $this;
    }
}
