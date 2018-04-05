<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
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
    private $license_plate;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $veh_id_number;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $eng_id_number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarsBrand", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carsBrand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarsModel", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carsModel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="car")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLicensePlate(): ?string
    {
        return $this->license_plate;
    }

    public function setLicensePlate(string $license_plate): self
    {
        $this->license_plate = $license_plate;

        return $this;
    }

    public function getVehIdNumber(): ?string
    {
        return $this->veh_id_number;
    }

    public function setVehIdNumber(string $veh_id_number): self
    {
        $this->veh_id_number = $veh_id_number;

        return $this;
    }

    public function getEngIdNumber(): ?string
    {
        return $this->eng�_id_number;
    }

    public function setEngIdNumber(string $eng�_id_number): self
    {
        $this->eng�_id_number = $eng�_id_number;

        return $this;
    }

    public function getCarsBrand(): ?CarsBrand
    {
        return $this->carsBrand;
    }

    public function setCarsBrand(?CarsBrand $carsBrand): self
    {
        $this->carsBrand = $carsBrand;

        return $this;
    }

    public function getCarsModel(): ?CarsModel
    {
        return $this->carsModel;
    }

    public function setCarsModel(?CarsModel $carsModel): self
    {
        $this->carsModel = $carsModel;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setCar($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getCar() === $this) {
                $order->setCar(null);
            }
        }

        return $this;
    }
}
