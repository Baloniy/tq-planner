<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipments')]
#[ORM\Index(fields: ['tag'], name: 'tag_idx')]
#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private readonly int $id;

    #[ORM\Column(type: 'datetime', length: 255)]
    private DateTimeInterface $created_at;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: EquipmentType::class)]
        private readonly EquipmentType $equipmentType,
        #[ORM\Column(name: 'item_level', type: 'smallint', length: 5)]
        private readonly int $itemLevel,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(type: 'string', length: 255, unique: true)]
        private readonly string $tag,
        #[ORM\Column(name: 'properties', type: 'json')]
        private array $properties = [],
        #[ORM\Column(name: 'level_requirement', type: 'smallint', length: 5, nullable: true)]
        private ?int $levelRequirement = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private ?string $classification = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private ?string $dropsIn = null,
        #[ORM\Column(name: 'dexterity_requirement', type: 'smallint', length: 5, nullable: true)]
        private ?int $dexterityRequirement = null,
        #[ORM\Column(name: 'intelligence_requirement', type: 'smallint', length: 5, nullable: true)]
        private ?int $intelligenceRequirement = null,
        #[ORM\Column(name: 'strength_requirement', type: 'smallint', length: 5, nullable: true)]
        private ?int $strengthRequirement = null,
        #[ORM\Column(name: 'equipment_set', type: 'string', length: 255, nullable: true)]
        private ?string $set = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private ?string $act = null,
        #[ORM\Column(type: 'text', length: 255, nullable: true)]
        private ?string $description = null,
        #[ORM\Column(name: 'bonus', type: 'json')]
        private array $bonus = [],
        #[ORM\Column(name: 'summons', type: 'json')]
        private array $summons = []
    ) {
        $this->created_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentType(): EquipmentType
    {
        return $this->equipmentType;
    }

    public function getItemLevel(): int
    {
        return $this->itemLevel;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getLevelRequirement(): ?int
    {
        return $this->levelRequirement;
    }

    public function setLevelRequirement(?int $levelRequirement): void
    {
        $this->levelRequirement = $levelRequirement;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): void
    {
        $this->classification = $classification;
    }

    public function getDropsIn(): ?string
    {
        return $this->dropsIn;
    }

    public function setDropsIn(?string $dropsIn): void
    {
        $this->dropsIn = $dropsIn;
    }

    public function getDexterityRequirement(): ?int
    {
        return $this->dexterityRequirement;
    }

    public function setDexterityRequirement(?int $dexterityRequirement): void
    {
        $this->dexterityRequirement = $dexterityRequirement;
    }

    public function getIntelligenceRequirement(): ?int
    {
        return $this->intelligenceRequirement;
    }

    public function setIntelligenceRequirement(?int $intelligenceRequirement): void
    {
        $this->intelligenceRequirement = $intelligenceRequirement;
    }

    public function getStrengthRequirement(): ?int
    {
        return $this->strengthRequirement;
    }

    public function setStrengthRequirement(?int $strengthRequirement): void
    {
        $this->strengthRequirement = $strengthRequirement;
    }

    public function getSet(): ?string
    {
        return $this->set;
    }

    public function setSet(?string $set): void
    {
        $this->set = $set;
    }

    public function getAct(): ?string
    {
        return $this->act;
    }

    public function setAct(?string $act): void
    {
        $this->act = $act;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getBonus(): array
    {
        return $this->bonus;
    }

    public function setBonus(array $bonus): void
    {
        $this->bonus = $bonus;
    }

    public function getSummons(): array
    {
        return $this->summons;
    }

    public function setSummons(array $summons): void
    {
        $this->summons = $summons;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }
}
