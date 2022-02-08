<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CharacterClassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'character_classes')]
#[ORM\Entity(repositoryClass: CharacterClassRepository::class)]
class CharacterClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Mastery::class)]
    #[ORM\JoinColumn(name: 'mastery_id', referencedColumnName: 'id')]
    private Mastery $mastery;

    #[ORM\ManyToOne(targetEntity: Mastery::class)]
    #[ORM\JoinColumn(name: 'additional_mastery_id', referencedColumnName: 'id')]
    private ?Mastery $additional_mastery;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'datetime', length: 255, nullable: false)]
    private \DateTimeInterface $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

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

    public function getMastery(): Mastery
    {
        return $this->mastery;
    }

    public function setMastery(Mastery $mastery): void
    {
        $this->mastery = $mastery;
    }

    public function getAdditionalMastery(): ?Mastery
    {
        return $this->additional_mastery;
    }

    public function setAdditionalMastery(?Mastery $additional_mastery): void
    {
        $this->additional_mastery = $additional_mastery;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): \DateTime | \DateTimeInterface
    {
        return $this->created_at;
    }
}
