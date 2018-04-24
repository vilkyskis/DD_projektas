<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

    /**
     * @ORM\Column(type="decimal", precision=2)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServicesCategory")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServicesSubCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subCategory;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?ServicesCategory
    {
        return $this->category;
    }

    public function setCategory(?ServicesCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSubCategory(): ?ServicesSubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?ServicesSubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }
}
