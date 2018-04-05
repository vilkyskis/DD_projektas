<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarsBrandRepository")
 */
class CarsBrand
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
     * @ORM\OneToMany(targetEntity="App\Entity\CarsModel", mappedBy="brand")
     */
    private $carsModels;

    public function __construct()
    {
        $this->carsModels = new ArrayCollection();
    }

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

    /**
     * @return Collection|CarsModel[]
     */
    public function getCarsModels(): Collection
    {
        return $this->carsModels;
    }

    public function addCarsModel(CarsModel $carsModel): self
    {
        if (!$this->carsModels->contains($carsModel)) {
            $this->carsModels[] = $carsModel;
            $carsModel->setBrand($this);
        }

        return $this;
    }

    public function removeCarsModel(CarsModel $carsModel): self
    {
        if ($this->carsModels->contains($carsModel)) {
            $this->carsModels->removeElement($carsModel);
            // set the owning side to null (unless already changed)
            if ($carsModel->getBrand() === $this) {
                $carsModel->setBrand(null);
            }
        }

        return $this;
    }
}
