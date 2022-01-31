<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'string', columnDefinition: 'CHAR(36) NOT NULL')]
    private string $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    #[ORM\Column(type: 'string', length: 50)]
    private string $sku;

    #[ORM\Column(type: 'integer')]
    private string $price;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdOn;

    public function __construct(string $id, string $name, string $sku, string $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->price = $price;
        $this->createdOn = new \DateTime();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function price(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function createdOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): void
    {
        $this->createdOn = $createdOn;
    }
}
