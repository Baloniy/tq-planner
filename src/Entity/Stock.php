<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 4)]
    private string $symbol;

    #[ORM\Column(type: 'string', length: 3)]
    private string $currency;

    #[ORM\Column(type: 'string', length: 30)]
    private string $exchangeName;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private int $price;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?float $priceChange;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?float $previousClose;

    #[ORM\Column(type: 'string', length: 3)]
    private string $region;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private ?string $shortName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getExchangeName(): ?string
    {
        return $this->exchangeName;
    }

    public function setExchangeName(string $exchangeName): self
    {
        $this->exchangeName = $exchangeName;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceChange(): ?int
    {
        return $this->priceChange;
    }

    public function setPriceChange(?int $priceChange): self
    {
        $this->priceChange = $priceChange;

        return $this;
    }

    public function getPreviousClose(): ?int
    {
        return $this->previousClose;
    }

    public function setPreviousClose(?int $previousClose): self
    {
        $this->previousClose = $previousClose;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }
}
