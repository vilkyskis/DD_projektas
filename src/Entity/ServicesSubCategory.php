<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesSubCategoryRepository")
 */
class ServicesSubCategory
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
     * @ORM\ManyToOne(targetEntity="App\Entity\ServicesCategory", inversedBy="subCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $superCategory;

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

    public function getSuperCategory(): ?ServicesCategory
    {
        return $this->superCategory;
    }

    public function setSuperCategory(?ServicesCategory $superCategory): self
    {
        $this->superCategory = $superCategory;

        return $this;
    }
}
