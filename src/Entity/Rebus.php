<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\RebusRepository;
use Doctrine\ORM\Mapping\{Column, Id, GeneratedValue};
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: RebusRepository::class)]
#[Table(name: 'rebuses')]
class Rebus
{
    #[
        Id,
        GeneratedValue,
        Column(type: 'integer')
    ]
    private int $id;

    #[Column(type: "string", length: 255)]
    private string $name;

    #[Column(type: "string", length: 255)]
    private string $type;

    #[Column(type: "datetime", length: 255, nullable: false)]
    private \DateTimeInterface $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
