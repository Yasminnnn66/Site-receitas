<?php

namespace Recipe\Mvc\Entity;
//Redireciona as funções de cada item da tabela recipe//
use Recipe\Mvc\Repository\RecipeRepository;

class Recipe
{
    public readonly int $id;
    public readonly string $url;
    public readonly string $title;
    public readonly string $description;


    function __construct(string $url, string $title, string $description)
    {
        $this->setUrl($url);
        $this->setTitle($title);
        $this->setDescription($description);

    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


}