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
    private $licensePlate;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $vehIdNumber;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $engIdNumber;

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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): self
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    public function getVehIdNumber(): ?string
    {
        return $this->vehIdNumber;
    }

    public function setVehIdNumber(string $vehIdNumber): self
    {
        $this->vehIdNumber = $vehIdNumber;

        return $this;
    }

    public function getEngIdNumber(): ?string
    {
        return $this->engIdNumber;
    }

    public function setEngIdNumber(string $engIdNumber): self
    {
        $this->engIdNumber = $engIdNumber;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function __toString()
    {
        return $this->licensePlate;
    }
}
