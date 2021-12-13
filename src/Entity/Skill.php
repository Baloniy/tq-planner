<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'skills')]
#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Mastery::class, inversedBy: 'skills')]
    private ?Mastery $mastery;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $tag;

    #[ORM\Column(type: 'integer')]
    private int $tier;

    #[ORM\Column(name: 'maximum_level', type: 'integer')]
    private int $maximumLevel;

    #[ORM\Column(type: 'string')]
    private string $type;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $parent;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $icon;

    #[ORM\Column(name: 'cool_down', type: 'string')]
    private string $coolDown;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $properties;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $summons;

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

    public function getMastery(): ?Mastery
    {
        return $this->mastery;
    }

    public function setMastery(?Mastery $mastery): void
    {
        $this->mastery = $mastery;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    public function getTier(): int
    {
        return $this->tier;
    }

    public function setTier(int $tier): void
    {
        $this->tier = $tier;
    }

    public function getMaximumLevel(): int
    {
        return $this->maximumLevel;
    }

    public function setMaximumLevel(int $maximumLevel): void
    {
        $this->maximumLevel = $maximumLevel;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): void
    {
        $this->parent = $parent;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    public function getCoolDown(): string
    {
        return $this->coolDown;
    }

    public function setCoolDown(string $coolDown): void
    {
        $this->coolDown = $coolDown;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getProperties(): ?array
    {
        return $this->properties;
    }

    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getSummons(): ?array
    {
        return $this->summons;
    }

    public function setSummons(?array $summons): void
    {
        $this->summons = $summons;
    }
}
