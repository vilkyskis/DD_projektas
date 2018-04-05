<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarsModelRepository")
 */
class CarsModel
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
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="carsModel")
     */
    private $cars;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarsBrand", inversedBy="carsModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
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
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setCarsModel($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->contains($car)) {
            $this->cars->removeElement($car);
            // set the owning side to null (unless already changed)
            if ($car->getCarsModel() === $this) {
                $car->setCarsModel(null);
            }
        }

        return $this;
    }

    public function getBrand(): ?CarsBrand
    {
        return $this->brand;
    }

    public function setBrand(?CarsBrand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
