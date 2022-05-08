<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use App\Repository\EquipmentSetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipment_set')]
#[ORM\Entity(repositoryClass: EquipmentSetRepository::class)]
class EquipmentSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(name: 'name', type: 'string')]
    private string $name;

    #[ORM\Column(name: 'tag', type: 'string')]
    private string $tag;

    #[ORM\Column(name: 'items', type: 'string')]
    private string $items;

    #[ORM\Column(name: 'properties', type: 'json', nullable: true)]
    private ?array $properties;

    #[ORM\Column(type: 'datetime', length: 255, nullable: false)]
    private DateTimeInterface $created_at;

    public function __construct()
    {
        $this->created_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getItems(): string
    {
        return $this->items;
    }

    public function setItems(string $items): void
    {
        $this->items = $items;
    }

    public function getProperties(): ?array
    {
        return $this->properties;
    }

    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }

    public function getCreatedAt(): DateTime | DateTimeInterface
    {
        return $this->created_at;
    }
}
