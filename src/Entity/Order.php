<?php
declare(strict_types=1);

namespace App\Entity;

use Acelaya\Doctrine\Type\PhpEnumType;
use App\Entity\OrdersEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var OrdersEnum
     *
     * @ORM\Column(type=OrdersEnum::class)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Service")
     */
    private $services;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cheque", cascade={"persist", "remove"})
     */
    private $cheque;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
        }

        return $this;
    }

    public function getCheque(): ?Cheque
    {
        return $this->cheque;
    }

    public function setCheque(?Cheque $cheque): self
    {
        $this->cheque = $cheque;

        return $this;
    }
}

// Register my types
PhpEnumType::registerEnumType(OrdersEnum::class);