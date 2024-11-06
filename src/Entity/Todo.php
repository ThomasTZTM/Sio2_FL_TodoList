<?php

namespace App\Entity;

class Todo
{
    private ?int $id = null;
    private string $title;
    private bool $completed = false;
    private \DateTime $createdAt;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->createdAt = new \DateTime();
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    // Setters
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setCompleted(bool $completed): self
    {
        $this->completed = $completed;
        return $this;
    }
} 