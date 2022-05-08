<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use App\Repository\EquipmentTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipment_types')]
#[ORM\Entity(repositoryClass: EquipmentTypeRepository::class)]
class EquipmentType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime', length: 255, nullable: false)]
    private DateTimeInterface $created_at;

    public function __construct(
        #[ORM\Column(name: 'name', type: 'string')]
        private string $name,
        #[ORM\Column(type: 'string', length: 255)]
        private string $tag
    ) {
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

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }
}
